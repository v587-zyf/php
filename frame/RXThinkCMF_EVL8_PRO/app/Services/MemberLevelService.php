<?php


namespace App\Services;

use App\Models\MemberLevelModel;

/**
 * 会员等级-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class MemberLevelService
 * @package App\Services
 */
class MemberLevelService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * MemberLevelService constructor.
     */
    public function __construct()
    {
        $this->model = new MemberLevelModel();
    }

    /**
     * 获取会员等级列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getMemberLevelList()
    {
        $list = $this->model->where("mark", "=", 1)->get()->toArray();
        return message(MESSAGE_OK, true, $list);
    }

}
