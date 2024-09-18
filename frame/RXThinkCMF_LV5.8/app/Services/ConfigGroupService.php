<?php


namespace App\Services;

use App\Models\ConfigGroupModel;

/**
 * 配置分组-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class ConfigGroupService
 * @package App\Services
 */
class ConfigGroupService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ConfigGroupService constructor.
     */
    public function __construct()
    {
        $this->model = new ConfigGroupModel();
    }
}
