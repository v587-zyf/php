<?php


namespace App\Http\Controllers;

use App\Services\PositionService;

/**
 * 岗位管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class PositionController
 * @package App\Http\Controllers
 */
class PositionController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * PositionController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new PositionService();
    }

    /**
     * 获取岗位列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getPositionList()
    {
        $result = $this->service->getPositionList();
        return $result;
    }

}
