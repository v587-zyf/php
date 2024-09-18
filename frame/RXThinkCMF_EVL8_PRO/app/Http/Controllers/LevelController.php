<?php


namespace App\Http\Controllers;

use App\Services\LevelService;

/**
 * 职级管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class LevelController
 * @package App\Http\Controllers
 */
class LevelController extends Backend
{

    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * LevelController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new LevelService();
    }

    /**
     * 获取职级列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getLevelList()
    {
        $result = $this->service->getLevelList();
        return $result;
    }

}
