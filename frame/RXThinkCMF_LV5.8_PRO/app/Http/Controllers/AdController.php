<?php


namespace App\Http\Controllers;

use App\Models\AdModel;
use App\Services\AdService;
use Illuminate\Http\Request;

/**
 * 广告管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class AdController
 * @package App\Http\Controllers
 */
class AdController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * AdController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new AdModel();
        $this->service = new AdService();
    }
}
