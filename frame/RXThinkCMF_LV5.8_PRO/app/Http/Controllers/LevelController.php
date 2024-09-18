<?php


namespace App\Http\Controllers;


use App\Models\LevelModel;
use App\Services\LevelService;
use Illuminate\Http\Request;

/**
 * 职级管理-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class LevelController
 * @package App\Http\Controllers
 */
class LevelController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * LevelController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new LevelModel();
        $this->service = new LevelService();
    }
}
