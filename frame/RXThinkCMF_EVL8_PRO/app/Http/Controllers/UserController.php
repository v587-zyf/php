<?php


namespace App\Http\Controllers;

use App\Services\UserService;

/**
 * 用户管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new UserService();
    }

    /**
     * 重置密码
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function resetPwd()
    {
        $result = $this->service->resetPwd();
        return $result;
    }

}
