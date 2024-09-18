<?php


namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Services\ItemService;
use Illuminate\Http\Request;

/**
 * 站点管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ItemController
 * @package App\Http\Controllers
 */
class ItemController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ItemController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ItemModel();
        $this->service = new ItemService();
    }
}
