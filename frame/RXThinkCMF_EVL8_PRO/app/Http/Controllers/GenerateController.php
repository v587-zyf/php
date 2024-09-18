<?php


namespace App\Http\Controllers;


use App\Services\GenerateService;

/**
 * 代码生成器-控制器
 * @author 牧羊人
 * @since 2020/11/12
 * Class GenerateController
 * @package App\Http\Middleware
 */
class GenerateController extends Backend
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/12
     * GenerateController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new GenerateService();
    }

    /**
     * 一键生成模块
     * @return mixed
     * @since 2020/11/12
     * @author 牧羊人
     */
    public function generate()
    {
        $result = $this->service->generate();
        return $result;
    }

}
