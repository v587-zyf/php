<?php


namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * 会员管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * UserController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new UserModel();
        $this->service = new UserService();
    }
}
