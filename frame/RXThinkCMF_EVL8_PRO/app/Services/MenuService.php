<?php


namespace App\Services;


use App\Models\MenuModel;

/**
 * 菜单管理-服务类
 * @author 牧羊人
 * @since 2020/11/10
 * Class MenuService
 * @package App\Services
 */
class MenuService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * MenuService constructor.
     */
    public function __construct()
    {
        $this->model = new MenuModel();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();

        // 查询条件
        $map = [];

        // 菜单标题
        $title = getter($param, "title");
        if ($title) {
            $map[] = ['title', 'like', "%{$title}%"];
        }
        $list = $this->model->getList($map, [['sort', 'asc']]);
        return message("操作成功", true, $list);
    }

    /**
     * 获取权限菜单列表
     * @param $userId
     * @return array
     * @author 牧羊人
     * @since 2020/11/11
     */
    public function getPermissionList($userId)
    {
        $list = [];
        if ($userId == 1) {
            // 管理员拥有全部权限
            $list = $this->model->getChilds(0);
        } else {
            // 其他角色
            $list = $this->getPermissionMenu($userId, 0);
        }
        return message("操作成功", true, $list);
    }

    /**
     * 获取菜单权限列表
     * @param $userId 用户ID
     * @param $pid 上级ID
     * @return mixed
     * @since 2020/11/14
     * @author 牧羊人
     */
    public function getPermissionMenu($userId, $pid = 0)
    {
        $menuModel = new MenuModel();
        $menuList = $menuModel::from("menu as m")
            ->select('m.*')
            ->join('role_menu as rm', 'rm.menu_id', '=', 'm.id')
            ->join('user_role as ur', 'ur.role_id', '=', 'rm.role_id')
            ->distinct(true)
            ->where('ur.user_id', '=', $userId)
            ->where('m.type', '=', 0)
            ->where('m.pid', '=', $pid)
            ->where('m.status', '=', 1)
            ->where('m.mark', '=', 1)
            ->orderBy('m.pid')
            ->orderBy('m.sort')
            ->get()->toArray();
        if (!empty($menuList)) {
            foreach ($menuList as &$val) {
                $childList = $this->getPermissionMenu($userId, $val['id']);
                if (is_array($childList) && !empty($childList)) {
                    $val['children'] = $childList;
                }
            }
        }
        return $menuList;
    }

}
