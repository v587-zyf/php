<?php


namespace App\Http\Controllers;

use App\Models\CrontabModel;
use App\Services\CrontabService;
use Illuminate\Http\Request;

/**
 * 定时任务-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class CrontabController
 * @package App\Http\Controllers
 */
class CrontabController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * CrontabController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new CrontabModel();
        $this->service = new CrontabService();
    }
}
