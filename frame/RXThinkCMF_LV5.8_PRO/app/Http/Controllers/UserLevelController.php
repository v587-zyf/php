<?php


namespace App\Http\Controllers;


use App\Models\UserLevelModel;
use App\Services\UserLevelService;
use Illuminate\Http\Request;

/**
 * 会员等级-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class UserLevelController
 * @package App\Http\Controllers
 */
class UserLevelController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * UserLevelController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new UserLevelModel();
        $this->service = new UserLevelService();
    }
}
