<?php


namespace App\Http\Controllers;


use App\Models\AdminModel;
use App\Models\AdminRomModel;
use App\Models\MenuModel;
use Illuminate\Http\Request;

class Backend extends BaseController
{
    // 模型
    protected $model;
    // 服务
    protected $service;
    // 校验
    protected $validate;
    // 登录ID
    protected $adminId;
    // 登录信息
    protected $adminInfo;

    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/31
     * Backend constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        // 初始化配置
        $this->initConfig();

        // 登录检测中间件
        $this->middleware('admin.login');

        // 初始化登录信息
        $this->middleware(function ($request, $next) {
            $adminId = $request->session()->get("adminId");

            // 登录验证
            $this->initLogin($adminId);

            // 权限验证
            $this->checkAuth();

            return $next($request);
        });

    }

    /**
     * 初始化配置
     * @author 牧羊人
     * @since: 2020/6/30
     */
    public function initConfig()
    {
        // 系统全称
        view()->share('siteName', SITE_NAME);
        // 系统简称
        view()->share('nickName', NICK_NAME);
        // 系统版本
        view()->share('version', VERSION);

        // 请求参数
        $this->param = \request()->input();

        // 分页基础默认值
        defined('PERPAGE') or define('PERPAGE', isset($this->param['limit']) ? $this->param['limit'] : 20);
        defined('PAGE') or define('PAGE', isset($this->param['page']) ? $this->param['page'] : 1);
    }

    /**
     * 登录验证
     * @param $adminId
     * @return
     * @author 牧羊人
     * @since 2020/8/31
     */
    public function initLogin($adminId)
    {
        // 登录用户ID
        $this->adminId = $adminId;

        // 登录用户信息
        $adminModel = new AdminModel();
        $adminInfo = $adminModel->getInfo($this->adminId);
        $this->adminInfo = $adminInfo;
        // 数据绑定
        view()->share("adminId", $this->adminId);
        view()->share("adminInfo", $this->adminInfo);
    }

    private function checkAuth()
    {
        // 获取控制器名、方法名
        list($class, $method) = explode('@', request()->route()->getActionName());
        // 获取控制器名
        $controllerName = str_replace(
            'Controller',
            '',
            substr(strrchr($class, '\\'), 1)
        );
        if (!in_array($controllerName, ['Login', 'Index'])) {
            // 获取菜单操作权限
            $menuModel = new MenuModel();
            $requestUrl = strtolower("/" . $controllerName . "/" . $method);
            $menuInfo = $menuModel->where([
                'type' => 3,
                'url' => $requestUrl,
                'mark' => 1
            ])->first();
            if (empty($menuInfo)) {
                if (IS_POST || IS_GET) {
                    return message('暂无操作权限', false);
                }
                return $this->render('public/404');
            }

            // 获取节点权限
            $adminRomModel = new AdminRomModel();
            $funcList = $adminRomModel->getPermissionFuncList($this->adminInfo['role_ids'], $this->adminId, $menuInfo['id']);
            view()->share("funcList", $funcList);
            if (!in_array($menuInfo['permission'], $funcList)) {
                if (IS_POST) {
                    return message('暂无操作权限', false);
                }
                return $this->render('public/404');
            }
        }
    }

    /**
     * 控制器默认入口
     * @return mixed
     * @author 牧羊人
     * @date 2019/2/25
     */
    public function index()
    {
        if (IS_POST) {
            $result = $this->service->getList();
            return $result;
        }
        // 默认参数
        $data = func_get_args();
        if (isset($data[0])) {
            foreach ($data[0] as $key => $val) {
                view()->share($key, $val);
            }
        }
        return $this->render();
    }

    /**
     * 添加或编辑
     * @param Request $request
     * @return view 页面渲染
     * @author zongjl
     * @date 2019/6/3
     */
    public function edit()
    {
        if (IS_POST) {
            $result = $this->service->edit();
            return $result;
        }
        $info = [];
        $id = request()->input('id', 0);
        if ($id) {
            $info = $this->model->getInfo($id);
        } else {
            $data = func_get_args();
            if (isset($data[0]) && !empty($data[0])) {
                foreach ($data[0] as $key => $val) {
                    $info[$key] = $val;

                }
            }
        }
        $this->assign('info', $info);
        return $this->render();
    }

    /**
     * 获取详情
     * @param Request $request 网络请求
     * @return view 页面渲染
     * @author zongjl
     * @date 2019/6/3
     */
    public function detail(Request $request)
    {
        if (IS_POST) {
            $result = $this->service->edit();
            return $result;
        }
        $id = $request->input("id", 0);
        if ($id) {
            $info = $this->model->getInfo($id);
            $this->assign('info', $info);
        }
        return $this->render();
    }

    /**
     * 删除
     * @param Request $request 网络请求
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/3
     */
    public function drop(Request $request)
    {
        if (IS_POST) {
            $id = $request->input('id', 0);
            $info = $this->model->getInfo($id);
            if ($info) {
                $result = $this->model->drop($id);
                if ($result !== false) {
                    return message();
                }
            }
            return message($this->model->getError(), false);
        }
    }

    /**
     * 重置缓存
     * @param Request $request 网络请求
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/3
     */
    public function cache(Request $request)
    {
        if (IS_POST) {
            $id = $request->input('id', 0);
            if (!$id) {
                return message("记录ID不能为空", false);
            }
            $result = $this->model->_cacheReset($id, '');
            if (!$result) {
                return message("缓存重置失败", false);
            }
            return message("缓存重置成功");
        }
    }

    /**
     * 一键复制
     * @param Request $request 网络请求
     * @return view 页面渲染
     * @author zongjl
     * @date 2019/6/3
     */
    public function copy(Request $request)
    {
        if (IS_POST) {
            $result = $this->service->edit();
            return $result;
        }
        $info = [];
        $id = $request->input("id", 0);
        if ($id) {
            $info = $this->model->getInfo($id);
        } else {
            $data = func_get_args();
            if ($data) {
                foreach ($data[0] as $key => $val) {
                    $info[$key] = $val;
                }
            }
        }
        // 复制作为新增数据，主键ID必须置空
        unset($info['id']);
        $this->assign('info', $info);
        return $this->render('edit');
    }

    /**
     * 更新单个字段
     * @param Request $request 网络请求
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/3
     */
    public function update(Request $request)
    {
        if (IS_POST) {
            $data = $request->all();
            $result = $this->model->edit($data);
            if ($result) {
                return message("更新成功");
            } else {
                return message("更新失败", false);
            }
        }
    }

    /**
     * 渲染模板
     * @param string $view 模板路径
     * @param array $data 参数
     * @return view 模板渲染
     * @author zongjl
     * @date 2019/6/3
     */
    public function render($view = "", $data = [])
    {
        if (empty($view)) {
            // 获取请求地址
            $path = \Illuminate\Support\Facades\Request::path();
            $pathItem = explode("/", $path);
            return view("{$pathItem[0]}.{$pathItem[1]}", $data);
        }
        return view($view, $data);
    }

    /**
     * 模板变量赋值
     * @param string $name 参数
     * @param null $value 参数值
     * @author 牧羊人
     * @since 2020/8/28
     */
    public function assign(string $name, $value = null)
    {
        view()->share($name, $value);
    }

    /**
     * 批量删除记录
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/3
     */
    public function batchDrop()
    {
        if (IS_POST) {
            $ids = explode(',', $_POST['id']);
            //批量删除
            $num = 0;
            foreach ($ids as $key => $val) {
                $res = $this->model->drop($val);
                if ($res !== false) {
                    $num++;
                }
            }
            return message('本次共选择' . count($ids) . "个条数据,删除" . $num . "个");
        }
    }

    /**
     * 批量重置缓存
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/3
     */
    public function batchCache()
    {
        if (IS_POST) {
            $ids = explode(',', $_POST['id']);
            //重置缓存
            foreach ($ids as $key => $val) {
                $this->model->_cacheReset($val);
            }
            return message('重置缓存成功！');
        }
    }

    /**
     * 批量设置状态
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/3
     */
    public function batchStatus()
    {
        if (IS_POST) {
            $ids = explode(',', $_POST['id']);
            $status = (int)$_POST['status'];
            if (!is_array($ids)) {
                return message("请选择数据记录", false);
            }
            $num = 0;
            foreach ($ids as $key => $val) {
                $result = $this->model->edit([
                    'id' => $val,
                    'status' => $status,
                ]);
                if ($result) {
                    $num++;
                }
            }
            return message("本次共更新【{$num}】条记录");
        }
    }

    /**
     * 设置状态
     * @return mixed
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function setStatus()
    {
        if (IS_POST) {
            $result = $this->service->setStatus();
            return $result;
        }
    }

}
