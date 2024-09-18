<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

/**
 * 统计报表
 * @author 牧羊人
 * @since 2020/8/30
 * Class StatisticsController
 * @package App\Http\Controllers
 */
class StatisticsController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * StatisticsController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * 统计报表
     * @return view|mixed
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function index()
    {
        return $this->render();
    }
}
