<?php


namespace App\Http\Controllers;


use App\Services\LayoutDescService;

/**
 * 布局描述-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class LayoutDescController
 * @package App\Http\Controllers
 */
class LayoutDescController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * LayoutDescController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new LayoutDescService();
    }
}
