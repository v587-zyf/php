<?php


namespace App\Services;

use App\Models\UserModel;

/**
 * 用户管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class UserService
 * @package App\Services
 */
class UserService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * UserService constructor.
     */
    public function __construct()
    {
        $this->model = new UserModel();
    }

    /**
     * 获取用户列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();

        // 查询条件
        $map = [];

        // 用户账号
        $username = getter($param, "username");
        if ($username) {
            $map[] = ["username", 'like', "%{$username}%"];
        }
        // 用户姓名
        $realname = getter($param, "realname");
        if ($realname) {
            $map[] = ['realname', 'like', "%{$realname}%"];
        }
        // 用户性别
        $gender = getter($param, "gender");
        if ($gender) {
            $map[] = ['gender', '=', $gender];
        }
        return parent::getList($map); // TODO: Change the autogenerated stub
    }

    /**
     * 添加或编辑用户
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function edit()
    {
        // 请求参数
        $data = request()->all();
        // 头像处理
        $avatar = isset($data['avatar']) ? trim($data['avatar']) : '';
        if (strpos($avatar, "temp")) {
            $data['avatar'] = save_image($avatar, 'user');
        } else {
            $data['avatar'] = str_replace(IMG_URL, "", $data['avatar']);
        }
        // 添加时设置密码
        if (empty($data['id'])) {
            $username = trim($data['username']);
            $password = trim($data['password']);
            $data['password'] = get_password($password . $username);
        }
        $error = "";
        $result = $this->model->edit($data, $error);
        if (!$result) {
            return message($error, false);
        }
        // 删除已存在的用户角色关系数据
        $userRoleService = new UserRoleService();
        $userRoleService->deleteUserRole($result);
        // 插入用户角色关系数据
        $userRoleService->insertUserRole($result, $data['role_ids']);
        return message();
    }

    /**
     * 获取用户信息
     * @param $userId 用户ID
     * @return array
     * @author 牧羊人
     * @since 2020/11/10
     */
    public function getUserInfo($userId)
    {
        $userInfo = $this->model->getInfo($userId);
        $userInfo['roles'] = [];
        $userInfo['authorities'] = [];
        return message("操作成功", true, $userInfo);
    }

    /**
     * 更新个人资料
     * @author 牧羊人
     * @since 2020/11/11
     */
    public function updateUserInfo()
    {
        return message();
    }

    /**
     * 更新密码
     * @param $userId 用户ID
     * @return array
     * @author 牧羊人
     * @since 2020/11/14
     */
    public function updatePwd($userId)
    {
        // 获取参数
        $param = request()->all();
        // 原始密码
        $oldPassword = trim(getter($param, "oldPassword"));
        if (!$oldPassword) {
            return message("旧密码不能为空", false);
        }
        // 新密码
        $newPassword = trim(getter($param, "newPassword"));
        if (!$newPassword) {
            return message("新密码不能为空", false);
        }
        $userInfo = $this->model->getInfo($userId);
        if (!$userInfo) {
            return message("用户信息不存在", false);
        }
        if ($userInfo['password'] != get_password($oldPassword . $userInfo['username'])) {
            return message("旧密码输入不正确", false);
        }
        // 设置新密码
        $userInfo['password'] = get_password($newPassword . $userInfo['username']);
        $result = $this->model->edit($userInfo);
        if (!$result) {
            return message("修改失败", false);
        }
        return message("修改成功");
    }

    /**
     * 重置密码
     * @return array
     * @since 2020/11/14
     * @author 牧羊人
     */
    public function resetPwd()
    {
        // 获取参数
        $param = request()->all();
        // 用户ID
        $userId = getter($param, "id");
        if (!$userId) {
            return message("用户ID不能为空", false);
        }
        $userInfo = $this->model->getInfo($userId);
        if (!$userInfo) {
            return message("用户信息不存在", false);
        }
        // 设置新密码
        $userInfo['password'] = get_password("123456" . $userInfo['username']);
        $result = $this->model->edit($userInfo);
        if (!$result) {
            return message("重置密码失败", false);
        }
        return message("重置密码成功");
    }

}
