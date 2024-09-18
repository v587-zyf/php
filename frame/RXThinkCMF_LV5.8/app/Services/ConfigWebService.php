<?php


namespace App\Services;


use App\Models\ConfigModel;

/**
 * 网站配置-服务类
 * @author 牧羊人
 * @since 2020/9/1
 * Class ConfigWebService
 * @package App\Services
 */
class ConfigWebService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/9/1
     * ConfigWebService constructor.
     */
    public function __construct()
    {
        $this->model = new ConfigModel();
    }

    /**
     * 设置配置信息
     * @return array
     * @since 2020/9/1
     * @author 牧羊人
     */
    public function config()
    {
        $data = request()->all();
        if (empty($data)) {
            return message("数据不能为空", false);
        }
        foreach ($data as $key => $val) {
            if (strpos($key, 'checkbox')) {
                $item = explode('__', $key);
                $key = $item[0];
                $val = implode(',', array_keys($val));
            } elseif (strpos($key, 'upimage')) {
                $item = explode('__', $key);
                $key = $item[0];
                if (strpos($val, "temp") !== false) {
                    //新上传图片
                    $val = save_image($val, 'config');
                } else {
                    $val = str_replace(IMG_URL, "", $val);
                }
            } elseif (strpos($key, 'upimgs')) {
                $item = explode('__', $key);
                $key = $item[0];

                $imgArr = explode(',', $val);
                $imgStr = [];
                foreach ($imgArr as $kt => $vt) {
                    if (strpos($vt, "temp")) {
                        //新上传图片
                        $imgStr[] = save_image($vt, 'config');
                    } else {
                        //过滤已上传图片
                        $imgStr[] = str_replace(IMG_URL, "", $vt);
                    }
                }
                $val = serialize($imgStr);
            } elseif (strpos($key, 'ueditor')) {
                $item = explode('__', $key);
                $key = $item[0];
                //内容处理
                save_image_content($val, '', "config");
            }
            $info = $this->model->getInfoByAttr([
                ['name', '=', $key],
            ]);
            if (!$info) {
                continue;
            }
            $this->model->edit([
                'id' => $info['id'],
                'value' => $val,
            ]);
        }
        return message();
    }
}
