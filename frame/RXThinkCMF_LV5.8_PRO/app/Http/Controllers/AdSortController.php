<?php


namespace App\Http\Controllers;

use App\Models\AdSortModel;
use App\Services\AdSortService;
use Illuminate\Http\Request;

/**
 * 广告位-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class AdSortController
 * @package App\Http\Controllers
 */
class AdSortController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * AdSortController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new AdSortModel();
        $this->service = new AdSortService();
    }
}
