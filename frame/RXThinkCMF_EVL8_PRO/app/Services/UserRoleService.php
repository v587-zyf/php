<?php


namespace App\Services;

use App\Models\UserRoleModel;

/**
 * 用户角色关系-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class UserRoleService
 * @package App\Services
 */
class UserRoleService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * UserRoleService constructor.
     */
    public function __construct()
    {
        $this->model = new UserRoleModel();
    }

    /**
     * 根据用户ID获取角色列表
     * @param $userId 用户ID
     * @return mixed
     * @author 牧羊人
     * @since 2020/11/11
     */
    public function getUserRoleList($userId)
    {
        $userRoleModel = new UserRoleModel();
        $roleList = $userRoleModel::from("role as r")
            ->select('r.*')
            ->join('user_role as ur', 'ur.role_id', '=', 'r.id')
            ->distinct(true)
            ->where('ur.user_id', '=', $userId)
            ->where('r.status', '=', 1)
            ->where('r.mark', '=', 1)
            ->orderBy('r.sort')
            ->get()->toArray();
        return $roleList;
    }

    /**
     * 删除用户角色关系数据
     * @param $userId 用户ID
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function deleteUserRole($userId)
    {
        $this->model->where("user_id", '=', $userId)->delete();
    }

    /**
     * 批量插入用户角色关系数据
     * @param $userId 用户ID
     * @param $roleIds 角色ID集合
     * @author 牧羊人
     * @since 2020/11/11
     */
    public function insertUserRole($userId, $roleIds)
    {
        if (!empty($roleIds)) {
            $list = [];
            foreach ($roleIds as $val) {
                $data = [
                    'user_id' => $userId,
                    'role_id' => $val,
                ];
                $list[] = $data;
            }
            $this->model->insert($list);
        }
    }

}
