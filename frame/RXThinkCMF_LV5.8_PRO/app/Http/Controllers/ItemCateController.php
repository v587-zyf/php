<?php


namespace App\Http\Controllers;

use App\Models\ItemCateModel;
use App\Services\ItemCateService;
use Illuminate\Http\Request;

/**
 * 栏目管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ItemCateController
 * @package App\Http\Controllers
 */
class ItemCateController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ItemCateController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ItemCateModel();
        $this->service = new ItemCateService();
    }

    /**
     * 获取栏目列表
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getCateList()
    {
        // 站点ID
        $itemId = request()->input("item_id", 0);
        $result = $this->model->getChilds($itemId, 0, true);
        $cateList = [];
        if (is_array($result)) {
            foreach ($result as $val) {
                $cateList[] = [
                    'id' => $val['id'],
                    'name' => $val['name'],
                ];
                foreach ($val['children'] as $vt) {
                    $cateList[] = [
                        'id' => $vt['id'],
                        'name' => "|--" . $vt['name'],
                    ];
                }
            }
        }
        return message("操作成功", true, $cateList);
    }
}
