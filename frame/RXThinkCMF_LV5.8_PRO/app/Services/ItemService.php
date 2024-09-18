<?php


namespace App\Services;

use App\Models\ItemModel;

/**
 * 站点管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class ItemService
 * @package App\Services
 */
class ItemService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ItemService constructor.
     */
    public function __construct()
    {
        $this->model = new ItemModel();
    }

    /**
     * 添加或编辑
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function edit()
    {
        $data = request()->all();

        // 图片处理
        $image = trim($data['image']);
        if (!$data['id'] && !$image) {
            return message('请上传站点图片', false);
        }
        if (strpos($image, "temp")) {
            $data['image'] = save_image($image, 'item');
        } else {
            $data['image'] = str_replace(IMG_URL, "", $data['image']);
        }
        return parent::edit($data); // TODO: Change the autogenerated stub
    }
}
