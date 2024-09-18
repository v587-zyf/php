<?php


namespace App\Http\Controllers;

use App\Models\ActionModel;
use App\Services\ActionService;
use Illuminate\Http\Request;

/**
 * 行为日志-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ActionController
 * @package App\Http\Controllers
 */
class ActionController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ActionController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ActionModel();
        $this->service = new ActionService();
    }
}
