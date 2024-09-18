<?php


namespace App\Services;

use App\Models\DicTypeModel;

/**
 * 字典类型-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class DicTypeService
 * @package App\Services
 */
class DicTypeService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * DicTypeService constructor.
     */
    public function __construct()
    {
        $this->model = new DicTypeModel();
    }
}
