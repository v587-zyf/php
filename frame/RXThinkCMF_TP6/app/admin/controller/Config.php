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


use app\admin\model\ConfigGroup;
use app\admin\service\ConfigService;
use app\common\controller\Backend;
use think\facade\Db;
use think\facade\View;

/**
 * 配置管理-控制器
 * @author 牧羊人
 * @since 2020/7/1
 * Class Config
 * @package app\admin\controller
 */
class Config extends Backend
{
    /**
     * 初始化
     * @author 牧羊人
     * @since 2020/7/1
     */
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->model = new \app\admin\model\Config();
        $this->service = new ConfigService();
    }

    /**
     * 数据列表页
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 牧羊人
     * @since 2020/7/1
     */
    public function index()
    {
        // 配置分组ID
        $group_id = request()->param('group_id', 1);

        // 获取配置分组
        $configGroupModel = new ConfigGroup();
        $configGroupList = $configGroupModel->where(['mark' => 1])->select();
        return parent::index([
            'group_id' => $group_id,
            'configGroupList' => $configGroupList->toArray(),
        ]); // TODO: Change the autogenerated stub
    }

    /**
     * 添加或编辑
     * @return mixed
     * @since 2020/7/1
     * @author 牧羊人
     */
    public function edit()
    {
        // 配置类型
        View::assign("typeList", config("admin.config_type"));
        // 配置分组
        View::assign("groupList", Db::name('configGroup')->where(['mark' => 1])->select()->toArray());
        // 分组ID
        $groupId = request()->param('group_id', 0);
        // 初始化默认值
        return parent::edit([
            'group_id' => $groupId,
        ]); // TODO: Change the autogenerated stub
    }

}