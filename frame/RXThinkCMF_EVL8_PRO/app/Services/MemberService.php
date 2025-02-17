<?php


namespace App\Services;

use App\Models\MemberModel;

/**
 * 会员管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class MemberService
 * @package App\Services
 */
class MemberService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * MemberService constructor.
     */
    public function __construct()
    {
        $this->model = new MemberModel();
    }

    /**
     * 添加会编辑会员
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function edit()
    {
        // 请求参数
        $data = request()->all();
        // 头像处理
        $avatar = trim($data['avatar']);
        if (strpos($avatar, "temp")) {
            $data['avatar'] = save_image($avatar, 'user');
        } else {
            $data['avatar'] = str_replace(IMG_URL, "", $data['avatar']);
        }
        // 出生日期
        if ($data['birthday']) {
            $data['birthday'] = strtotime($data['birthday']);
        }
        // 城市处理
        $city = isset($data['city']) ? $data['city'] : [3];
        if (!empty($data['city'])) {
            // 省份
            $data['province_id'] = $city[0];
            // 城市
            $data['city_id'] = $city[1];
            // 县区
            $data['district_id'] = $city[2];
        }
        unset($data['city']);
        return parent::edit($data); // TODO: Change the autogenerated stub
    }

}
