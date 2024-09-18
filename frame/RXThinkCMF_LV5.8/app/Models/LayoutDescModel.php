<?php


namespace App\Models;

/**
 * 布局描述-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class LayoutDescModel
 * @package App\Models
 */
class LayoutDescModel extends BaseModel
{
    // 设置数据表
    protected $table = "layout_desc";

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
            // 获取站点信息
            if ($info['item_id']) {
                $itemModel = new ItemModel();
                $item_info = $itemModel->getInfo($info['item_id']);
                $info['item_name'] = $item_info['name'];
            }
        }
        return $info;
    }
}
