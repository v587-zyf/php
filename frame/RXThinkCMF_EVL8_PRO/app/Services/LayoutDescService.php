<?php


namespace App\Services;

use App\Models\LayoutDescModel;

/**
 * 布局描述-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class LayoutDescService
 * @package App\Services
 */
class LayoutDescService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * LayoutDescService constructor.
     */
    public function __construct()
    {
        $this->model = new LayoutDescModel();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();

        // 查询条件
        $map = [];

        // 布局描述
        $loc_desc = getter($param, "loc_desc");
        if ($loc_desc) {
            $map[] = ["loc_desc", '=', $loc_desc];
        }
        return parent::getList($map); // TODO: Change the autogenerated stub
    }

}
