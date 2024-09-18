<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 南京RXThinkCMF研发中心
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <1175401194@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;


use app\admin\service\ConfigGroupService;
use app\common\controller\Backend;

/**
 * 配置分组-控制器
 * @author 牧羊人
 * @since 2020/7/1
 * Class Configgroup
 * @package app\admin\controller
 */
class Configgroup extends Backend
{
    /**
     * 初始化
     * @author 牧羊人
     * @since 2020/7/1
     */
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->model = new \app\admin\model\ConfigGroup();
        $this->service = new ConfigGroupService();
    }
}