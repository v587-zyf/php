<?php


namespace App\Http\Controllers;

use App\Models\ActionLogModel;
use App\Services\LoginService;

/**
 * 登录控制器
 * @author 牧羊人
 * @since 2020/11/10
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Backend
{

    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/10
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new LoginService();
    }

    /**
     * 获取验证码
     * @return mixed
     * @since 2020/11/10
     * @author 牧羊人
     */
    public function captcha()
    {
        $result = $this->service->captcha();
        return $result;
    }

    /**
     * 系统登录
     * @author 牧羊人
     * @since 2020/11/10
     */
    public function login()
    {
        $result = $this->service->login();
        return $result;
    }

    /**
     * 退出系统
     * @author 牧羊人
     * @since 2020/11/10
     */
    public function logout()
    {
        $result = $this->service->logout();
        return $result;
    }

}
