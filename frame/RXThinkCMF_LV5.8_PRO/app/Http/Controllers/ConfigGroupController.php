<?php


namespace App\Http\Controllers;

use App\Models\ConfigGroupModel;
use App\Services\ConfigGroupService;
use Illuminate\Http\Request;

/**
 * 配置分组-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ConfigGroupController
 * @package App\Http\Controllers
 */
class ConfigGroupController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ConfigGroupController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ConfigGroupModel();
        $this->service = new ConfigGroupService();
    }
}
