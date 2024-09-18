<?php


namespace App\Http\Controllers;

use App\Services\ConfigGroupService;

/**
 * 配置分组-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class ConfigGroupController
 * @package App\Http\Controllers
 */
class ConfigGroupController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * ConfigGroupController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new ConfigGroupService();
    }
}
