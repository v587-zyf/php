<?php


namespace App\Services;

use App\Models\ActionModel;

/**
 * 行为日志-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class ActionService
 * @package App\Services
 */
class ActionService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ActionService constructor.
     */
    public function __construct()
    {
        $this->model = new ActionModel();
    }
}
