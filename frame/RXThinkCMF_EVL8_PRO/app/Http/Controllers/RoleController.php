<?php


namespace App\Http\Controllers;

use App\Services\RoleService;

/**
 * 角色管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * RoleController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new RoleService();
    }

    /**
     * 获取角色列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getRoleList()
    {
        $result = $this->service->getRoleList();
        return $result;
    }

    /**
     * 获取角色权限列表
     * @author 牧羊人
     * @since 2020/11/11
     */
    public function getPermissionList()
    {
        $result = $this->service->getPermissionList();
        return $result;
    }

    /**
     * 保存权限
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function savePermission()
    {
        $result = $this->service->savePermission();
        return $result;
    }

}
