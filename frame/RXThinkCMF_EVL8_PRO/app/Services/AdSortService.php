<?php


namespace App\Services;

use App\Models\AdSortModel;

/**
 * 广告位管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class AdSortService
 * @package App\Services
 */
class AdSortService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * AdSortService constructor.
     */
    public function __construct()
    {
        $this->model = new AdSortModel();
    }

    /**
     * 获取广告位列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getAdSortList()
    {
        $list = $this->model->where("mark", '=', 1)->get()->toArray();
        return message("操作成功", true, $list);
    }

}
