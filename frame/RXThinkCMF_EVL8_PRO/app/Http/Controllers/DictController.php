<?php


namespace App\Http\Controllers;

use App\Services\DictService;

/**
 * 字典管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class DictController
 * @package App\Http\Controllers
 */
class DictController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * DictController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new DictService();
    }
}
