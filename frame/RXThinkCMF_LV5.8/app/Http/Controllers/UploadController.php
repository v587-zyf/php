<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2019 南京RXThink工作室
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink.cn@gmail.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 上传-控制器
 * @author zongjl
 * @date 2019/5/31
 * Class UploadController
 * @package App\Http\Controllers
 */
class UploadController extends BaseController
{
    /**
     * 构造方法
     * @param Request $request 网络请求
     * @author zongjl
     * @date 2019/5/31
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // TODO...
    }

    /**
     * 上传图片(单个上传)
     * @param Request $request 网络请求
     * @author zongjl
     * @date 2019/5/31
     */
    public function uploadImage(Request $request)
    {
        // 上传单图统一调取方法
        $result = upload_image($request, 'file');
        if (!$result['success']) {
            return message($result['message'], false);
        }

        // 文件路径
        $file_path = $result['data']['img_path'];
        if (!$file_path) {
            return message("文件上传失败", false);
        }

        // 网络域名拼接
        if (strpos($file_path, IMG_URL) === false) {
            $file_path = IMG_URL . $file_path;
        }

        // 返回结果
        return message(MESSAGE_OK, true, $file_path);
    }

    /**
     * 上传文件(单个上传)
     * @param Request $request 网络请求
     * @author zongjl
     * @date 2019/5/31
     */
    public function uploadFile(Request $request)
    {
        $result = upload_file($request);
        if (!$result['success']) {
            $this->jsonReturn(MESSAGE_FAILED, false, $result['message']);
        }
        // 文件路径
        $file_path = $result['data']['file_path'];
        if (!$file_path) {
            $this->jsonReturn(message("文件上传失败"));
        }

        // 网络域名拼接
        if (strpos($file_path, IMG_URL) === false) {
            $file_path = IMG_URL . $file_path;
        }

        // 返回结果
        $this->jsonReturn(MESSAGE_OK, true, $file_path);
    }
}
