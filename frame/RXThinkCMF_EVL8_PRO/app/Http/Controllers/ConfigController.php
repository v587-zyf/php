<?php


namespace App\Http\Controllers;

use App\Services\ConfigService;

/**
 * 配置管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class ConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * ConfigController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new ConfigService();
    }
}
