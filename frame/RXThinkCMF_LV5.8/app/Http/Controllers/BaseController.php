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

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;

/**
 * 基类控制器
 *
 * @author zongjl
 * @date 2019/5/23
 */
// 跨域问题解决方案
header("Access-Control-Allow-Origin:*");

class BaseController extends Controller
{
//    // 模型
//    protected $model;
//    // 服务
//    protected $service;
//    // 验证
//    protected $validate;
//    // 网络请求
//    protected $request;
//    // 请求序列号(系统生成)
//    protected $request_id;
//    // 鉴权Token
//    protected $token;
//    // 人员ID
//    protected $adminId;
//    // 人员信息
//    protected $adminInfo;

    /**
     * 构造函数
     * BaseController constructor.
     * @param Request $request
     * @author zongjl
     * @date 2019/5/23
     */
    public function __construct(Request $request)
    {
        // 初始化网络请求配置
        $this->initRequestConfig($request);

        // 初始化系统常量
        $this->initSystemConst();
    }

    /**
     * 初始化请求配置
     * @param Request $request 网络请求
     * @author zongjl
     * @date 2019/5/23
     */
    private function initRequestConfig(Request $request)
    {

        // 定义是否GET请求
        defined('IS_GET') or define('IS_GET', $request->isMethod('GET'));

        // 定义是否POST请求
        defined('IS_POST') or define('IS_POST', $request->isMethod('POST'));

        // 定义是否AJAX请求
        defined('IS_AJAX') or define('IS_AJAX', $request->ajax());

        // 定义是否PAJAX请求
        defined('IS_PJAX') or define('IS_PJAX', $request->pjax());

        // 定义是否PUT请求
        defined('IS_PUT') or define('IS_PUT', $request->isMethod('PUT'));

        // 定义是否DELETE请求
        defined('IS_DELETE') or define('IS_DELETE', $request->isMethod('DELETE'));

        // 请求方式
        defined('REQUEST_METHOD') or define('REQUEST_METHOD', $request->method());

        // 请求地址
        list($controller, $action) = explode('/', $request->path());
        // 控制器名
        defined('CONTROLLER_NAME') or define('CONTROLLER_NAME', $controller);
        // 方法名
        defined('ACTION_NAME') or define('ACTION_NAME', $action);

        // 获取请求地址
        $path = \Illuminate\Support\Facades\Request::path();
        $pathItem = explode("/", $path);
        // 控制器名
        view()->share("app", strtolower($pathItem[0]));
        // 方法名
        view()->share("act", strtolower($pathItem[1]));
    }

    /**
     * 初始化系统常量
     * @author zongjl
     * @date 2019/5/23
     */
    private function initSystemConst()
    {
        // 项目根目录
        defined('ROOT_PATH') or define('ROOT_PATH', base_path());

        // 文件上传目录
        defined('ATTACHMENT_PATH') or define('ATTACHMENT_PATH', base_path('public/uploads'));

        // 图片上传目录
        defined('IMG_PATH') or define('IMG_PATH', base_path('public/uploads/images'));

        // 临时存放目录
        defined('UPLOAD_TEMP_PATH') or define('UPLOAD_TEMP_PATH', ATTACHMENT_PATH . "/temp");

        // 定义普通图片域名
        defined('IMG_URL') or define('IMG_URL', env('IMG_URL'));

        // 数据表前缀
        define('DB_PREFIX', DB::connection()->getTablePrefix());

        // 系统配置
        define('SITE_NAME', env('SITE_NAME'));
        define('NICK_NAME', env('NICK_NAME'));
        define('VERSION', env('VERSION'));

//        // 系统域名
//        define('SITE_URL', env('domain.siteurl'));
//        define('IMG_URL', env('domain.img_url'));
    }
}
