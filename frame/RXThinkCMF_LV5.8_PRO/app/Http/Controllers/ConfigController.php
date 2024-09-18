<?php


namespace App\Http\Controllers;

use App\Models\ConfigGroupModel;
use App\Models\ConfigModel;
use App\Services\ConfigService;
use Illuminate\Http\Request;

/**
 * 配置管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ConfigController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ConfigModel();
        $this->service = new ConfigService();
    }

    /**
     * 配置列表
     * @return
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function index()
    {
        if (IS_POST) {
            $result = $this->service->getList();
            return $result;
        }
        // 配置分组ID
        $group_id = request()->input('group_id', 1);

        // 获取配置分组
        $configGroupModel = new ConfigGroupModel();
        $configGroupList = $configGroupModel->where('mark', '=', 1)->orderBy("sort")->get()->toArray();
        return view("config.index")
            ->with("group_id", $group_id)
            ->with("configGroupList", $configGroupList);
    }
}
