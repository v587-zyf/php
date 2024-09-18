<?php


namespace App\Models;

/**
 * 会员管理-模型
 * @author 牧羊人
 * @since 2020/8/28
 * Class UserModel
 * @package App\Models
 */
class UserModel extends BaseModel
{
    // 设置数据表
    protected $table = "user";

    /**
     * 获取记录信息
     * @param int $id 记录ID
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 会员头像
            if ($info['avatar']) {
                $info['avatar_url'] = get_image_url($info['avatar']);
            }

            // 会员性别
            if ($info['gender']) {
                $info['gender_name'] = config('admin.gender_list')[$info['gender']];
            }

            // 设备类型
            $info['device_name'] = config("admin.user_device")[$info['device']];

            // 用户来源
            if ($info['source']) {
                $info['source_name'] = config("admin.user_source")[$info['source']];
            }

            // 格式化出生日期
            if ($info['birthday']) {
                $info['format_birthday'] = datetime($info['birthday'], "Y-m-d");
            }

            // 获取城市名称
            if ($info['district_id']) {
                $cityModel = new CityModel();
                $cityName = $cityModel->getCityName($info['district_id'], " ");
                if ($cityName) {
                    $info['city_area'] = $cityName;
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
