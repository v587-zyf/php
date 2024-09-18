<?php


namespace App\Http\Controllers;


use App\Services\AdService;

/**
 * 广告管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class AdController
 * @package App\Http\Controllers
 */
class AdController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * AdController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new AdService();
    }
}
