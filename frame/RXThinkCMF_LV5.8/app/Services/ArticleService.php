<?php


namespace App\Services;

use App\Models\ArticleModel;

/**
 * CMS管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class ArticleService
 * @package App\Services
 */
class ArticleService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->model = new ArticleModel();
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
        // 封面处理
        $cover = trim($data['cover']);
        if (strpos($cover, "temp")) {
            $data['cover'] = save_image($cover, 'article');
        } else {
            $data['cover'] = str_replace(IMG_URL, "", $data['cover']);
        }
        // 文章图集
        $imgsList = trim($data['imgs']);
        if ($imgsList) {
            $imgArr = explode(',', $imgsList);
            foreach ($imgArr as $key => $val) {
                if (strpos($val, "temp")) {
                    //新上传图片
                    $imgStr[] = save_image($val, 'article');
                } else {
                    //过滤已上传图片
                    $imgStr[] = str_replace(IMG_URL, "", $val);
                }
            }
        }
        $data['imgs'] = serialize($imgStr);
        //内容处理
        save_image_content($data['content'], $data['title'], "article");
        return parent::edit($data); // TODO: Change the autogenerated stub
    }
}
