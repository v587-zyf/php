<?php


namespace App\Services;

use App\Models\AdminRomModel;
use App\Models\MenuModel;

/**
 * 权限管理-服务类
 * @author 牧羊人
 * @since 2020/8/28
 * Class AdminRomService
 * @package App\Services
 */
class AdminRomService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/28
     * AdminRomService constructor.
     */
    public function __construct()
    {
        $this->model = new AdminRomModel();
    }

    /**
     * 获取菜单权限列表
     * @return array
     * @since 2020/8/28
     * @author 牧羊人
     */
    public function getList()
    {
        // 类型
        $type = request()->input("type");
        // 类型ID
        $typeId = request()->input('typeId');

        // 获取所有菜单
        $menuModel = new MenuModel();
        $menuList = $menuModel->getList([], [['sort', 'asc']]);
        // 获取有权限的菜单
        $where = [
            ['type', '=', $type],
            ['type_id', '=', $typeId],
        ];
        $adminRomModel = new AdminRomModel();
        $permissionList = $adminRomModel->getList($where, [['menu_id', 'asc']]);
        $checkList = [];
        if ($permissionList) {
            $checkList = array_column($permissionList, "menu_id");
        }
        $list = [];
        if (!empty($menuList)) {
            foreach ($menuList as $val) {
                $data = [];
                $data['id'] = $val['id'];
                $data['name'] = trim($val['name']);
                $data['pId'] = $val['pid'];
                if (in_array($val['id'], $checkList)) {
                    $data['checked'] = true;
                } else {
                    $data['checked'] = false;
                }
                $data['open'] = true;
                $list[] = $data;
            }
        }
        return message("操作成功", true, $list);
    }

    /**
     * 设置权限
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\BindParamException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @since 2020/7/3
     * @author 牧羊人
     */
    public function setPermission()
    {
        // 参数
        $param = request()->all();
        // 类型
        $type = intval($param['type']);
        // 类型ID
        $typeId = intval($param['typeId']);
        if (!$typeId) {
            return message("类型ID不能为空", false);
        }
        // 删除现有的权限
        $where = [
            ['type', '=', $type],
            ['type_id', '=', $typeId],
        ];
        $adminRomModel = new AdminRomModel();
        $permissionList = $adminRomModel->getList($where, [['menu_id', 'asc']]);
        if ($permissionList) {
            $itemList = array_column($permissionList, "id");
            $adminRomModel->deleteAll($itemList, true);
        }
        // 权限ID
        $authIds = trim($param['authIds']);
        if ($authIds) {
            $itemArr = explode(',', $authIds);
            foreach ($itemArr as $val) {
                $data = [
                    'type' => $type,
                    'type_id' => $typeId,
                    'menu_id' => $val,
                ];
                $adminRomModel = new AdminRomModel();
                $adminRomModel->edit($data);
            }
        }
        return message("操作成功");
    }
}
