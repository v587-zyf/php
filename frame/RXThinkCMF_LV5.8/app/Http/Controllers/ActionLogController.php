<?php


namespace App\Http\Controllers;

use App\Models\ActionLogModel;
use App\Services\ActionLogService;
use Illuminate\Http\Request;

/**
 * 行为日志-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ActionLogController
 * @package App\Http\Controllers
 */
class ActionLogController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ActionLogController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ActionLogModel();
        $this->service = new ActionLogService();
    }
}
