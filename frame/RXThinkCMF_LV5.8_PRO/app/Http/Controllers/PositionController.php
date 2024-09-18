<?php


namespace App\Http\Controllers;


use App\Models\PositionModel;
use App\Services\PositionService;
use Illuminate\Http\Request;

/**
 * 岗位管理-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class PositionController
 * @package App\Http\Controllers
 */
class PositionController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * PositionController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new PositionModel();
        $this->service = new PositionService();
    }
}
