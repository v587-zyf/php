<?php


namespace App\Services;

use App\Models\UserLevelModel;

/**
 * 会员等级-服务类
 * @author 牧羊人
 * @since 2020/8/28
 * Class UserLevelService
 * @package App\Services
 */
class UserLevelService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/28
     * UserLevelService constructor.
     */
    public function __construct()
    {
        $this->model = new UserLevelModel();
    }
}
