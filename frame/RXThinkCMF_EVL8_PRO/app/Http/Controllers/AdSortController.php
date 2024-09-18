<?php


namespace App\Http\Controllers;


use App\Services\AdSortService;

/**
 * 广告位管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class AdSortController
 * @package App\Http\Controllers
 */
class AdSortController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * AdSortController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new AdSortService();
    }

    /**
     * 获取广告位列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getAdSortList()
    {
        $result = $this->service->getAdSortList();
        return $result;
    }

}
