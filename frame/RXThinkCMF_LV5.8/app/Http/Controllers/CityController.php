<?php


namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Services\CityService;
use Illuminate\Http\Request;

/**
 * 城市管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class CityController
 * @package App\Http\Controllers
 */
class CityController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * CityController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new CityModel();
        $this->service = new CityService();
    }

    /**
     * 获取子级城市
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getChilds()
    {
        if (IS_POST) {
            $id = request()->input("id", 0);
            $list = $this->model->getChilds($id);
            return message('操作成功', true, $list);
        }
    }
}
