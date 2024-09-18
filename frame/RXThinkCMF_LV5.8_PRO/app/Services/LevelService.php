<?php


namespace App\Services;


use App\Models\LevelModel;

/**
 * 职级管理-服务类
 * @author 牧羊人
 * @since 2020/8/28
 * Class LevelService
 * @package App\Services
 */
class LevelService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/28
     * LevelService constructor.
     */
    public function __construct()
    {
        $this->model = new LevelModel();
    }
}
