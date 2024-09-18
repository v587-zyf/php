<?php


namespace App\Http\Controllers;

use App\Services\DictTypeService;

/**
 * 字典类型-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class DictTypeController
 * @package App\Http\Controllers
 */
class DictTypeController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * DictTypeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new DictTypeService();
    }
}
