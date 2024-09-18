<?php


namespace App\Http\Controllers;

use App\Models\LayoutDescModel;
use App\Services\LayoutDescService;
use Illuminate\Http\Request;

/**
 * 布局描述-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class LayoutDescController
 * @package App\Http\Controllers
 */
class LayoutDescController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * LayoutDescController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new LayoutDescModel();
        $this->service = new LayoutDescService();
    }

    /**
     * 获取布局描述
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getLayoutDescList()
    {
        // 站点ID
        $itemId = request()->input("item_id", 0);
        $list = $this->model->where(['item_id' => $itemId, 'mark' => 1])->orderBy("sort")->get()->toArray();
        return message("操作成功", true, $list);
    }
}
