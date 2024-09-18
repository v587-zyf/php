<?php


namespace App\Http\Controllers;

use App\Models\NoticeModel;
use App\Services\NoticeService;
use Illuminate\Http\Request;

/**
 * 通知公告-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class NoticeController
 * @package App\Http\Controllers
 */
class NoticeController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * NoticeController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new NoticeModel();
        $this->service = new NoticeService();
    }
}
