<?php


namespace App\Services;

use App\Models\NoticeModel;

/**
 * 通知公告-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class NoticeService
 * @package App\Services
 */
class NoticeService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * NoticeService constructor.
     */
    public function __construct()
    {
        $this->model = new NoticeModel();
    }
}
