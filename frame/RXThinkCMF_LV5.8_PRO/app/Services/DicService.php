<?php


namespace App\Services;

use App\Models\DicModel;

/**
 * 字典管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class DicService
 * @package App\Services
 */
class DicService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * DicService constructor.
     */
    public function __construct()
    {
        $this->model = new DicModel();
    }
}
