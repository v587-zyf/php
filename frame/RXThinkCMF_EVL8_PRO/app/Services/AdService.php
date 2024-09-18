<?php


namespace App\Services;

use App\Models\AdModel;

/**
 * 广告管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class AdService
 * @package App\Services
 */
class AdService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * AdService constructor.
     */
    public function __construct()
    {
        $this->model = new AdModel();
    }

    /**
     * 添加或编辑
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function edit()
    {
        $data = request()->all();
        // 图片处理
        $cover = trim($data['cover']);
        if (strpos($cover, "temp")) {
            $data['cover'] = save_image($cover, 'ad');
        } else {
            $data['cover'] = str_replace(IMG_URL, "", $data['cover']);
        }
        // 开始时间
        if ($data['start_time']) {
            $data['start_time'] = strtotime($data['start_time']);
        }
        // 结束时间
        if ($data['end_time']) {
            $data['end_time'] = strtotime($data['end_time']);
        }
        return parent::edit($data); // TODO: Change the autogenerated stub
    }

}
