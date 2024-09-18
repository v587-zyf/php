<?php


namespace App\Http\Controllers;

use App\Services\MemberService;

/**
 * 会员管理-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class MemberController
 * @package App\Http\Controllers
 */
class MemberController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * MemberController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new MemberService();
    }
}
