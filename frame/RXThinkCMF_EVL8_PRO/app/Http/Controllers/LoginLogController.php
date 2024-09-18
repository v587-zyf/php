<?php


namespace App\Http\Controllers;

use App\Services\LoginLogService;

/**
 * 登录日志-控制器
 * @author 牧羊人
 * @since 2020/11/12
 * Class LoginLogController
 * @package App\Http\Controllers
 */
class LoginLogController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/12
     * LoginLogController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new LoginLogService();
    }
}
