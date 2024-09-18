<?php


namespace App\Http\Controllers;

use App\Services\MemberLevelService;

/**
 * 会员等级-控制器
 * @author 牧羊人
 * @since 2020/11/11
 * Class MemberLevelController
 * @package App\Http\Controllers
 */
class MemberLevelController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * MemberLevelController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new MemberLevelService();
    }

    /**
     * 获取会员等级列表
     * @return mixed
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getMemberLevelList()
    {
        $result = $this->service->getMemberLevelList();
        return $result;
    }

}
