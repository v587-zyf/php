<?php


namespace App\Models;

/**
 * 广告管理-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class AdModel
 * @package App\Models
 */
class AdModel extends BaseModel
{
    // 设置数据表
    protected $table = "ad";

    /**
     * 获取缓存信息
     * @param int $id
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 封面
            if ($info['cover']) {
                $info['cover_url'] = get_image_url($info['cover']);
            }

            // 广告类型
            if ($info['type']) {
                $info['type_name'] = config('admin.ad_type')[$info['type']];
            }

            // 广告位
            if ($info['sort_id']) {
                $adSortModel = new AdSortModel();
                $adSortInfo = $adSortModel->getInfo($info['sort_id']);
                $info['sort_name'] = $adSortInfo['name'] . "=>" . $adSortInfo['loc_id'];
            }
        }
        return $info;
    }
}
