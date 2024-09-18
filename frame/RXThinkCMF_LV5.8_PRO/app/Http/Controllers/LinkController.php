<?php


namespace App\Http\Controllers;


use App\Models\LinkModel;
use App\Services\LinkService;
use Illuminate\Http\Request;

/**
 * 友链管理-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class LinkController
 * @package App\Http\Controllers
 */
class LinkController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * LinkController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new LinkModel();
        $this->service = new LinkService();
    }
}
