<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2019 南京RXThink工作室
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink.cn@gmail.com>
// +----------------------------------------------------------------------

namespace App\Models;

/**
 * 测试-模型
 * @author zongjl
 * @date 2019/5/28
 * Class TestModel
 * @package App\Models
 */
class TestModel extends BaseModel
{
    // 设置数据表
    protected $table = 'admin';

    // 禁用缓存
//    protected $is_cache = false;

    /**
     * 获取缓存信息
     * @param int $id 记录ID
     * @return array 返回结果
     * @author zongjl
     * @date 2019/5/28
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // TODO...
        }
        return $info;
    }
}
