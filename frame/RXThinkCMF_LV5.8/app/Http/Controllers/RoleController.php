<?php


namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Services\RoleService;
use Illuminate\Http\Request;

/**
 * 角色管理-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * RoleController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new RoleModel();
        $this->service = new RoleService();
    }
}
