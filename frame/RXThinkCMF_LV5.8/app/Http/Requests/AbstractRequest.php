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

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request;

/**
 * 请求抽象类
 * @author zongjl
 * @date 2019/5/28
 * Class AbstractRequest
 * @package App\Http\Requests
 */
abstract class AbstractRequest extends Request
{
    /** 错误提示把信息
     * @var string 错误信息
     */
    protected $error = '';

    /**
     * 获取错误信息
     * @return string 返回错误信息
     * @author zongjl
     * @date 2019/5/28
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 设置错误信息
     * @param string $error 错误信息
     * @return bool 返回bool值
     * @author zongjl
     * @date 2019/5/28
     */
    public function setError($error)
    {
        $this->error = $error;
        return false;
    }
}
