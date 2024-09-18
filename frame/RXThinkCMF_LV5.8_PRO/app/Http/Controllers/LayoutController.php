<?php


namespace App\Http\Controllers;

use App\Models\LayoutModel;
use App\Services\LayoutService;
use Illuminate\Http\Request;

/**
 * 布局管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class LayoutController
 * @package App\Http\Controllers
 */
class LayoutController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * LayoutController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new LayoutModel();
        $this->service = new LayoutService();
    }
}
