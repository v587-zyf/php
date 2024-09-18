<?php


namespace App\Services;

use App\Models\ActionLogModel;

/**
 * 行为日志
 * @author 牧羊人
 * @since 2020/8/30
 * Class ActionLogService
 * @package App\Services
 */
class ActionLogService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ActionLogService constructor.
     */
    public function __construct()
    {
        $this->model = new ActionLogModel();
    }
}
