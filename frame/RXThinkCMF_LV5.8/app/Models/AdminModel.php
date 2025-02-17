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
 * 人员管理-模型
 * @author zongjl
 * @date 2019/5/23
 * Class AdminModel
 * @package App\Models
 */
class AdminModel extends BaseModel
{
    // 设置数据表
    protected $table = 'admin';

    /**
     * 获取缓存信息
     * @param int $id 记录ID
     * @return array 返回结果
     * @author zongjl
     * @date 2019/6/4
     */
    public function getInfo($id)
    {
        // 清除缓存
        $this->cacheDelete($id);
        $info = parent::getInfo($id, true);
        if ($info) {
            // 头像
            if ($info['avatar']) {
                $info['avatar_url'] = get_image_url($info['avatar']);
            }

            // 入职日期
            if ($info['entry_date']) {
                $info['format_entry_date'] = datetime($info['entry_date'], 'Y-m-d');
            }

            // 性别
            if ($info['gender']) {
                $info['gender_name'] = config('admin.gender_list')[$info['gender']];
            }

            // 岗位
            if ($info['position_id']) {
                $positionModel = new PositionModel();
                $positionInfo = $positionModel->getInfo($info['position_id']);
                $info['position_name'] = $positionInfo['name'];
            }

            // 职级
            if ($info['level_id']) {
                $levelMod = new LevelModel();
                $levelInfo = $levelMod->getInfo($info['level_id']);
                $info['level_name'] = $levelInfo['name'];
            }

            // 获取城市名称
            if ($info['district_id']) {
                $cityMod = new CityModel();
                $cityName = $cityMod->getCityName($info['district_id'], " ");
                if ($cityName) {
                    $info['city_name'] = $cityName;
                    $cityItem = explode(" ", $cityName);
                    $info['province_name'] = $cityItem[0];
                    $info['city_name'] = $cityItem[1];
                    $info['district_name'] = $cityItem[2];
                }
            }
        }
        return $info;
    }
}
