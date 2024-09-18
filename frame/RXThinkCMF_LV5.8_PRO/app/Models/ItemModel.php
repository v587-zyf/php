<?php


namespace App\Models;

/**
 * 站点-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class ItemModel
 * @package App\Models
 */
class ItemModel extends BaseModel
{
    // 设置数据表
    protected $table = "item";

    /**
     * 获取缓存信息
     * @param int $id 记录ID
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 站点图片
            if ($info['image']) {
                $info['image_url'] = get_image_url($info['image']);
            }

            // 站点类型
            if ($info['type']) {
                $info['type_name'] = config('admin.item_type')[$info['type']];
            }
        }
        return $info;
    }
}
