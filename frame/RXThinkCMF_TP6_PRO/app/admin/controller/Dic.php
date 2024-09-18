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


use app\admin\service\DicService;
use app\common\controller\Backend;
use think\View;

/**
 * 字典-控制器
 * @author 牧羊人
 * @since 2020/7/2
 * Class Dic
 * @package app\admin\controller
 */
class Dic extends Backend
{
    /**
     * 初始化
     * @author 牧羊人
     * @since 2020/7/2
     */
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->model = new \app\admin\model\Dic();
        $this->service = new DicService();
    }

    /**
     * 添加或编辑
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 牧羊人
     * @since 2020/7/2
     */
    public function edit()
    {
        $dicTypeMod = new \app\admin\model\DicType();
        $typeList = $dicTypeMod->where("mark", 1)->select()->toArray();
        \think\facade\View::assign("typeList", $typeList);
        return parent::edit(); // TODO: Change the autogenerated stub
    }
}