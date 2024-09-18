<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2019 南京RXThink工作室
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink.cn@gmail.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers;

use App\Models\ActionLogModel;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * 系统登录-控制器
 * @author 牧羊人
 * @since 2020/8/29
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Backend
{
    /**
     * 构造方法
     *
     * @param Request $request
     * @author zongjl
     * @date 2019-05-24
     */
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this->service = new LoginService();
    }

    /**
     * 登录API
     *
     * @author zongjl
     * @date 2019-05-24
     */
    function login(Request $request)
    {
        if (IS_POST) {
            $result = $this->service->login($request);
            return $result;
        }
        return view('login');
    }

    /**
     * 退出系统
     * @return
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function logout()
    {
        // 清空SESSION
        session()->put("adminId", null);
        // 记录退出日志
        ActionLogModel::setTitle("系统退出");
        ActionLogModel::record();
        // 跳转登录页
        return redirect(url('/login/login'));
    }


}
