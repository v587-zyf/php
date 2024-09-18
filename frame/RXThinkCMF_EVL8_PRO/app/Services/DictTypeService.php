<?php


namespace App\Services;

use App\Models\DictTypeModel;

/**
 * 字典类型-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class DictTypeService
 * @package App\Services
 */
class DictTypeService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * DictTypeService constructor.
     */
    public function __construct()
    {
        $this->model = new DictTypeModel();
    }
}
