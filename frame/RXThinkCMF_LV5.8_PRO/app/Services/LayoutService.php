<?php


namespace App\Services;


use App\Models\LayoutModel;

/**
 * 布局管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class LayoutService
 * @package App\Services
 */
class LayoutService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * LayoutService constructor.
     */
    public function __construct()
    {
        $this->model = new LayoutModel();
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
        $image = trim($data['image']);
        if (!$data['id'] && !$image) {
            return message('请上传封面', false);
        }
        if (strpos($image, "temp")) {
            $data['image'] = save_image($image, 'layout');
        } else {
            $data['image'] = str_replace(IMG_URL, "", $data['image']);
        }
        return parent::edit($data); // TODO: Change the autogenerated stub
    }
}
