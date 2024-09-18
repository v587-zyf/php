<?php


namespace App\Models;

/**
 * 布局管理-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class LayoutModel
 * @package App\Models
 */
class LayoutModel extends BaseModel
{
    // 设置数据表
    protected $table = "layout";

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
            // 获取图片
            if ($info['image']) {
                $info['image_url'] = get_image_url($info['image']);
            }

            // 类型名称
            if ($info['type']) {
                $info['type_name'] = config('admin.layout_type')[$info['type']];
            }

            // 推荐类型
            if ($info['type'] == 1) {
                // CMS文章

            } else {
                // TODO...
            }

            // 页面位置
            if ($info['item_id']) {
                $itemModel = new ItemModel();
                $itemInfo = $itemModel->getInfo($info['item_id']);
                $info['item_name'] = $itemInfo['name'];
            }

            // 页面编号
            $layoutDescModel = new LayoutDescModel();
            $layoutDescInfo = $layoutDescModel->where([
                'item_id' => $info['item_id'],
                'loc_id' => $info['loc_id'],
            ])->first();
            if ($layoutDescInfo) {
                $info['loc_name'] = $layoutDescInfo['loc_desc'] . "=>" . $layoutDescInfo['loc_id'];
            }
        }
        return $info;
    }
}
