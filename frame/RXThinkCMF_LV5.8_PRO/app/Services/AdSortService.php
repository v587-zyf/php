<?php


namespace App\Services;

use App\Models\AdSortModel;

/**
 * 广告位-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class AdSortService
 * @package App\Services
 */
class AdSortService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * AdSortService constructor.
     */
    public function __construct()
    {
        $this->model = new AdSortModel();
    }
}
