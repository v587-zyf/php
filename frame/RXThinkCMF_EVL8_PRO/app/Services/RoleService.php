<?php


namespace App\Services;

use App\Models\MenuModel;
use App\Models\RoleMenuModel;
use App\Models\RoleModel;

/**
 * 角色管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class RoleService
 * @package App\Services
 */
class RoleService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * RoleService constructor.
     */
    public function __construct()
    {
        $this->model = new RoleModel();
    }

    /**
     * 获取角色列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getRoleList()
    {
        $list = $this->model->where([
            ['status', '=', 1],
            ['mark', '=', 1],
        ])->orderBy("sort", "asc")
            ->get()
            ->toArray();
        return message("操作成功", true, $list);
    }

    /**
     * 获取角色权限列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getPermissionList()
    {
        // 请求参数
        $param = request()->all();
        // 角色ID
        $roleId = intval(getter($param, "role_id", 0));
        // 获取全部菜单
        $menuModel = new MenuModel();
        $menuList = $menuModel->where([
            ['status', '=', 1],
            ['mark', '=', 1],
        ])->orderBy("sort", "asc")->get()->toArray();
        if (!empty($menuList)) {
            $roleMenuModel = new RoleMenuModel();
            $roleMenuList = $roleMenuModel->where("role_id", $roleId)->get("menu_id")->toArray();
            $menuIdList = array_key_value($roleMenuList, "menu_id");
            foreach ($menuList as &$val) {
                if (in_array($val['id'], $menuIdList)) {
                    $val['checked'] = true;
                    $val['open'] = true;
                }
            }
        }
        return message(MESSAGE_OK, true, $menuList);
    }

    /**
     * 保存角色菜单权限数据
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function savePermission()
    {
        // 请求参数
        $param = request()->all();
        // 角色ID
        $roleId = intval(getter($param, "role_id", 0));
        if (!$roleId) {
            return message("角色ID不能为空", false);
        }
        unset($param['role_id']);
        // 删除角色菜单关系数据
        $roleMenuModel = new RoleMenuModel();
        $roleMenuModel->where("role_id", $roleId)->delete();
        // 插入角色菜单关系数据
        if (is_array($param) && !empty($param)) {
            $list = [];
            foreach ($param as $val) {
                $data = [
                    'role_id' => $roleId,
                    'menu_id' => $val,
                ];
                $list[] = $data;
            }
        }
        $roleMenuModel->insert($list);
        return message();
    }

}
