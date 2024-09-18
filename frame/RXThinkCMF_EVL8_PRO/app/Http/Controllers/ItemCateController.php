<?php


namespace App\Http\Controllers;


use App\Services\ItemCateService;

/**
 * 栏目管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class ItemCateController
 * @package App\Http\Controllers
 */
class ItemCateController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * ItemCateController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new ItemCateService();
    }
}
