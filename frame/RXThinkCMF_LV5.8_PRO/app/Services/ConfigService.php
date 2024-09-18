<?php


namespace App\Services;

use App\Models\ConfigModel;

/**
 * 配置管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class ConfigService
 * @package App\Services
 */
class ConfigService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ConfigService constructor.
     */
    public function __construct()
    {
        $this->model = new ConfigModel();
    }
}
