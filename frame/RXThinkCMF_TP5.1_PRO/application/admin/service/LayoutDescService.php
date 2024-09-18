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

namespace app\admin\service;

use app\admin\model\LayoutDesc;
use app\common\service\old;

/**
 * 布局描述-服务类
 * @author 牧羊人
 * @since 2020/7/10
 * Class LayoutDescService
 * @package app\admin\service
 */
class LayoutDescService extends old
{
    /**
     * 初始化模型
     * @author 牧羊人
     * @date 2019/5/5
     */
    public function initialize()
    {
        parent::initialize();
        $this->model = new LayoutDesc();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/7/10
     * @author 牧羊人
     */
    public function getList()
    {
        // 参数
        $param = request()->param();

        // 查询条件
        $map = [];

        // 位置描述
        $loc_desc = isset($param['loc_desc']) ? $param['loc_desc'] : '';
        if ($loc_desc) {
            $map[] = ['loc_desc', 'like', "%{$loc_desc}%"];
        }

        return parent::getList($map); // TODO: Change the autogenerated stub
    }
}
