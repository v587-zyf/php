<?php


namespace App\Services;

use App\Models\LayoutDescModel;

/**
 * 布局描述-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class LayoutDescService
 * @package App\Services
 */
class LayoutDescService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * LayoutDescService constructor.
     */
    public function __construct()
    {
        $this->model = new LayoutDescModel();
    }
}
