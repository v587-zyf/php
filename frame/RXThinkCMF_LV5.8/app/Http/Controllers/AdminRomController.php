<?php


namespace App\Http\Controllers;

use App\Models\AdminRomModel;
use App\Services\AdminRomService;
use Illuminate\Http\Request;

/**
 * 权限管理-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class AdminRomController
 * @package App\Http\Controllers
 */
class AdminRomController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * AdminRomController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new AdminRomModel();
        $this->service = new AdminRomService();
    }

    /**
     * 获取权限菜单列表
     * @return view|array|mixed
     * @since 2020/8/28
     * @author 牧羊人
     */
    public function index()
    {
        $result = $this->service->getList();
        return $result;
    }

    /**
     * 设置权限
     * @return array
     * @since 2020/8/28
     * @author 牧羊人
     */
    public function setPermission()
    {
        $result = $this->service->setPermission();
        return $result;
    }
}
