<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * 权限管理-模型
 * @author 牧羊人
 * @since 2020/8/29
 * Class AdminRomModel
 * @package App\Models
 */
class AdminRomModel extends BaseModel
{
    // 设置数据表
    protected $table = 'admin_rom';

    /**
     * 获取权限列表
     * @param $adminId 人员ID
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @since: 2020/6/30
     * @author 牧羊人
     */
    public function getPermissionList($adminId)
    {

        $adminModel = new AdminModel();
        $adminInfo = $adminModel->find($adminId);
        $adminInfo = !empty($adminInfo) ? $adminInfo->toArray() : $adminInfo;
        $menuList = $this->getPermissionMenu($adminInfo['role_ids'], $adminId, 1, 0);
        return $menuList;
    }

    /**
     * 获取权限菜单
     * @param $roleIds
     * @param $adminId
     * @param $type
     * @param $pid
     * @return mixed
     * @since 2020/8/19
     * @author 牧羊人
     */
    public function getPermissionMenu($roleIds, $adminId, $type, $pid)
    {
        // 角色权限查询条件
        $map1 = [];
        if ($roleIds) {
            $roleArr = explode(",", $roleIds);
            $map1 = [
                ['r.type', '=', 1],
                ['r.type_id', $roleArr],
            ];
        }
        // 个人独立权限查询条件
        $map2 = [
            ['r.type', '=', 2],
            ['r.type_id', '=', $adminId],
        ];
        $menuModel = new MenuModel();
        $menuList = $menuModel::from("menu as m")
            ->select('m.*')
            ->join('admin_rom as r', 'r.menu_id', '=', 'm.id')
            ->distinct(true)
            ->where(function ($query) use ($map1, $map2) {
                if (!empty($map1)) {
                    $query->orWhere($map1);
                }
                $query->orWhere($map2);
            })
            ->where('m.type', '=', $type)
            ->where('m.pid', '=', $pid)
            ->where('m.status', '=', 1)
            ->where('m.mark', '=', 1)
            ->orderBy('m.pid')
            ->orderBy('m.sort')
            ->get()->toArray();
        if (!empty($menuList)) {
            $type += 1;
            if ($type <= 4) {
                foreach ($menuList as &$val) {
                    $childList = $this->getPermissionMenu($roleIds, $adminId, $type, $val['id']);
                    if (is_array($childList) && !empty($childList)) {
                        $val['children'] = $childList;
                    }
                }
            }
        }
        return $menuList;
    }

    /**
     * 获取权限节点列表
     * @param $roleIds 角色ID
     * @param $adminId 用户ID
     * @param $pid
     * @return mixed
     * @author 牧羊人
     * @since 2020/11/16
     */
    public function getPermissionFuncList($roleIds, $adminId, $pid)
    {
        // 角色权限查询条件
        $map1 = [];
        if ($roleIds) {
            $roleArr = explode(",", $roleIds);
            $map1 = [
                ['r.type', '=', 1],
                ['r.type_id', $roleArr],
            ];
        }
        // 个人独立权限查询条件
        $map2 = [
            ['r.type', '=', 2],
            ['r.type_id', '=', $adminId],
        ];
        $menuModel = new MenuModel();
        $funcList = $menuModel::from("menu as m")
            ->select('m.*')
            ->join('admin_rom as r', 'r.menu_id', '=', 'm.id')
            ->distinct(true)
            ->where(function ($query) use ($map1, $map2) {
                if (!empty($map1)) {
                    $query->orWhere($map1);
                }
                $query->orWhere($map2);
            })
            ->where('m.type', '=', 4)
            ->where('m.pid', '=', $pid)
            ->where('m.status', '=', 1)
            ->where('m.mark', '=', 1)
            ->orderBy('m.pid')
            ->orderBy('m.sort')
            ->select('m.permission')
            ->get()->toArray();
        $funcList = array_key_value($funcList, "permission");
        return $funcList;
    }

}
