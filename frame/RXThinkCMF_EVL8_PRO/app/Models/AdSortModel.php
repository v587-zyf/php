<?php


namespace App\Models;

/**
 * 广告位管理-模型
 * @author 牧羊人
 * @since 2020/11/11
 * Class AdSortModel
 * @package App\Models
 */
class AdSortModel extends BaseModel
{
    // 设置数据表
    protected $table = 'ad_sort';

    public function getInfo($id)
    {
        $info = parent::getInfo($id); // TODO: Change the autogenerated stub
        if ($info) {
            // 获取栏目名称
            if ($info['cate_id']) {
                $itemCateModel = new ItemCateModel();
                $itemCateName = $itemCateModel->getCateName($info['cate_id'], ">>");
                $info['item_cate_name'] = $itemCateName;
            }
        }
        return $info;
    }

}
