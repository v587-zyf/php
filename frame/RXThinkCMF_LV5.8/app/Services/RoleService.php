<?php


namespace App\Services;

use App\Models\RoleModel;

/**
 * 角色管理-服务类
 * @author 牧羊人
 * @since 2020/8/28
 * Class RoleService
 * @package App\Services
 */
class RoleService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/28
     * RoleService constructor.
     */
    public function __construct()
    {
        $this->model = new RoleModel();
    }
}
