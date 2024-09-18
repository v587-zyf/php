<?php


namespace App\Http\Controllers;

use App\Services\LayoutService;

/**
 * 布局管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class LayoutController
 * @package App\Http\Controllers
 */
class LayoutController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * LayoutController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new LayoutService();
    }

}
