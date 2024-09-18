<?php


namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\AdminRomModel;
use App\Services\AdminService;
use App\Services\MenuService;
use App\Services\UserService;

/**
 * 系统主页控制器
 * @author 牧羊人
 * @since 2020/11/10
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Backend
{

    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/10
     * IndexController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台主页
     * @author 牧羊人
     * @since 2020/11/10
     */
    public function getMenuList()
    {
        $menuService = new MenuService();
        $menuList = $menuService->getPermissionList($this->userId);
        return $menuList;
    }

    /**
     * 获取个人信息
     * @return array
     * @since 2020/11/10
     * @author 牧羊人
     */
    public function getUserInfo()
    {
        $userService = new UserService();
        $result = $userService->getUserInfo($this->userId);
        return $result;
    }

    /**
     * 更新个人资料
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function updateUserInfo()
    {
        $userService = new UserService();
        $result = $userService->updateUserInfo();
        return $result;
    }

    /**
     * 更新密码
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function updatePwd()
    {
        $userService = new UserService();
        $result = $userService->updatePwd($this->userId);
        return $result;
    }

}
