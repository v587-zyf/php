<?php


namespace App\Http\Controllers;


use App\Models\DicTypeModel;
use App\Services\DicTypeService;
use Illuminate\Http\Request;

/**
 * 字典类型-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class DicTypeController
 * @package App\Http\Controllers
 */
class DicTypeController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * DicTypeController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new DicTypeModel();
        $this->service = new DicTypeService();
    }
}
