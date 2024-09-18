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
 * 用户-模型
 * 
 * @author 牧羊人
 * @date 2018-12-14
 */
namespace app\admin\model;
use app\common\model\BaseModel;
class UserModel extends BaseModel
{
    // 设置数据表
    protected $name = 'user';
    
    /**
     * 获取缓存信息
     * 
     * @author 牧羊人
     * @date 2018-12-14
     * (non-PHPdoc)
     * @see \app\common\model\BaseModel::getInfo()
     */
    function getInfo($id)
    {
        $info = parent::getInfo($id);
        if($info) {
            
            // 头像
            if($info['avatar']) {
                $info['avatar_url'] = IMG_URL . $info['avatar'];
            }
            
        }
        return $info;
    }
    
}