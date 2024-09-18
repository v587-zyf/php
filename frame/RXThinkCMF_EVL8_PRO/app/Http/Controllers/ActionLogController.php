<?php


namespace App\Http\Controllers;

use App\Services\ActionLogService;

/**
 * 行为日志-控制器
 * @author 牧羊人
 * @since 2020/11/12
 * Class ActionLogController
 * @package App\Http\Controllers
 */
class ActionLogController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/12
     * ActionLogController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new ActionLogService();
    }
}
