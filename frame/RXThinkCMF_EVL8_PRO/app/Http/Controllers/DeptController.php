<?php


namespace App\Http\Controllers;

use App\Services\DeptService;

/**
 * 部门管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class DeptController
 * @package App\Http\Controllers
 */
class DeptController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * DeptController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new DeptService();
    }
}
