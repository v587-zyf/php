<?php


namespace App\Models;

/**
 * 广告位-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class AdSortModel
 * @package App\Models
 */
class AdSortModel extends BaseModel
{
    // 设置数据表
    protected $table = "ad_sort";

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
            // 获取站点
            if ($info['item_id']) {
                $itemModel = new ItemModel();
                $itemInfo = $itemModel->getInfo($info['item_id']);
                $info['item_name'] = $itemInfo['name'];
            }

            // 获取栏目
            if ($info['cate_id']) {
                $itemCateModel = new ItemCateModel();
                $cateName = $itemCateModel->getCateName($info['cate_id'], ">>");
                $info['cate_name'] = $cateName;
            }

            // 使用平台
            if ($info['platform']) {
                $info['platform_name'] = config('admin.ad_platform')[$info['platform']];
            }
        }
        return $info;
    }
}
