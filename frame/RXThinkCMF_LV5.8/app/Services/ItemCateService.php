<?php


namespace App\Services;

use App\Models\ItemCateModel;

/**
 * 栏目管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class ItemCateService
 * @package App\Services
 */
class ItemCateService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ItemCateService constructor.
     */
    public function __construct()
    {
        $this->model = new ItemCateModel();
    }

    /**
     * 添加或编辑
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function edit()
    {
        // 参数
        $data = request()->all();
        // 是否有封面
        $is_cover = $data['is_cover'];
        // 封面地址
        $cover = trim($data['cover']);
        //封面验证
        if ($is_cover == 1 && !$data['id'] && !$cover) {
            return message('请上传栏目封面', false);
        }
        if ($is_cover == 1) {
            if (strpos($cover, "temp")) {
                $data['cover'] = save_image($cover, 'itemcate');
            } else {
                $data['cover'] = str_replace(IMG_URL, "", $data['cover']);
            }
        } elseif ($is_cover == 2) {
            $data['cover'] = '';
        }
        return parent::edit($data); // TODO: Change the autogenerated stub
    }
}
