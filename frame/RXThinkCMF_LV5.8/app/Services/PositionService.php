<?php


namespace App\Services;


use App\Models\PositionModel;

/**
 * 岗位管理-服务类
 * @author 牧羊人
 * @since 2020/8/28
 * Class PositionService
 * @package App\Providers
 */
class PositionService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/28
     * PositionService constructor.
     */
    public function __construct()
    {
        $this->model = new PositionModel();
    }
}
