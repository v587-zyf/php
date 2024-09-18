<?php


namespace App\Http\Controllers;

use App\Services\MenuService;

/**
 * 菜单管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * MenuController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new MenuService();
    }
}
