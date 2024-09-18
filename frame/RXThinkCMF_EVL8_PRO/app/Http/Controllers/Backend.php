<?php


namespace App\Http\Controllers;

use App\Helpers\Jwt;
use App\Models\UserModel;

/**
 * 后台控制器基类
 * @author 牧羊人
 * @since 2020/11/10
 * Class Backend
 * @package App\Http\Controllers
 */
class Backend extends BaseController
{
    // 模型
    protected $model;
    // 服务
    protected $service;
    // 校验
    protected $validate;
    // 登录ID
    protected $userId;
    // 登录信息
    protected $userInfo;

    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/10
     * Backend constructor.
     */
    public function __construct()
    {
        parent::__construct();
        // 初始化配置
        $this->initConfig();

        // 登录检测中间件
        $this->middleware('user.login');

        // 初始化登录信息
        $this->middleware(function ($request, $next) {
            // 请求头信息
            $token = $request->headers->get('Authorization');
            $token = str_replace("Bearer ", null, $token);
            // JWT解密token
            $jwt = new Jwt();
            $userId = $jwt->verifyToken($token);

            // 登录验证
            $this->initLogin($userId);

            return $next($request);
        });
    }

    /**
     * 初始化配置
     * @author 牧羊人
     * @since 2020/11/10
     */
    public function initConfig()
    {
        // 请求参数
        $this->param = \request()->input();

        // 分页基础默认值
        defined('PERPAGE') or define('PERPAGE', isset($this->param['limit']) ? $this->param['limit'] : 20);
        defined('PAGE') or define('PAGE', isset($this->param['page']) ? $this->param['page'] : 1);
    }

    /**
     * 登录验证
     * @param $userId 用户ID
     * @return
     * @author 牧羊人
     * @since 2020/8/31
     */
    public function initLogin($userId)
    {
        // 登录用户ID
        $this->userId = $userId;

        // 登录用户信息
        if ($userId) {
            $adminModel = new UserModel();
            $userInfo = $adminModel->getInfo($this->userId);
            $this->userInfo = $userInfo;
        }

    }

    /**
     * 获取数据列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function index()
    {
        $result = $this->service->getList();
        return $result;
    }

    /**
     * 获取数据详情
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function info()
    {
        $result = $this->service->info();
        return $result;
    }

    /**
     * 添加或编辑
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function edit()
    {
        $result = $this->service->edit();
        return $result;
    }

    /**
     * 删除数据
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function delete()
    {
        $result = $this->service->delete();
        return $result;
    }

}
