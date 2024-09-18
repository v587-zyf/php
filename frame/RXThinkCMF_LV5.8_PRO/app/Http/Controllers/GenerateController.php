<?php


namespace App\Http\Controllers;

use App\Services\GenerateService;
use Illuminate\Http\Request;

/**
 * 代码生成器-控制器
 * @author 牧羊人
 * @since 2020/9/1
 * Class GenerateController
 * @package App\Http\Controllers
 */
class GenerateController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/9/1
     * GenerateController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->service = new GenerateService();
    }

    /**
     * 一键生成模块
     * @return mixed
     * @since 2020/9/1
     * @author 牧羊人
     */
    public function generate()
    {
        if (IS_POST) {
            return $this->service->generate();
        }
    }
}
