<?php


namespace App\Http\Controllers;

use App\Services\NoticeService;

/**
 * 通知公告-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class NoticeController
 * @package App\Http\Controllers
 */
class NoticeController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * NoticeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new NoticeService();
    }
}
