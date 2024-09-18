<?php


namespace App\Http\Controllers;

use App\Services\LinkService;

/**
 * 友链管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class LinkController
 * @package App\Http\Controllers
 */
class LinkController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * LinkController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new LinkService();
    }
}
