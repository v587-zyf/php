<?php


namespace App\Http\Controllers;

use App\Services\CityService;

/**
 * 城市管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class CityController
 * @package App\Http\Controllers
 */
class CityController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * CityController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new CityService();
    }
}
