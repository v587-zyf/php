<?php
// +----------------------------------------------------------------------
// | RXThink框架 [ RXThink ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2019 南京RXThink工作室
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink@gmail.com>
// +----------------------------------------------------------------------

/**
 * 挂件基类
 * 
 * @author 牧羊人
 * @date 2018-12-10
 */
namespace app\admin\widget;
use think\Controller;
class BaseWidget extends Controller
{
    // 模型、服务
    protected $model,$service;
    
    /**
     * 构造方法
     * 
     * @author 牧羊人
     * @date 2018-12-12
     */
    function __construct()
    {
        parent::__construct();
        //TODO...
    }
    
}