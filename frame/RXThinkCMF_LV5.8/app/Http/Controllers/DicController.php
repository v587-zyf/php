<?php


namespace App\Http\Controllers;


use App\Models\DicModel;
use App\Services\DicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 字典管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class DicController
 * @package App\Http\Controllers
 */
class DicController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * DicController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new DicModel();
        $this->service = new DicService();
    }
}
