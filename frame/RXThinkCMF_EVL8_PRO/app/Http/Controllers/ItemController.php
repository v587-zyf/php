<?php


namespace App\Http\Controllers;

use App\Services\ItemService;

/**
 * 站点管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class ItemController
 * @package App\Http\Controllers
 */
class ItemController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * ItemController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new ItemService();
    }

    /**
     * 获取站点列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getItemList()
    {
        $result = $this->service->getItemList();
        return $result;
    }

}
