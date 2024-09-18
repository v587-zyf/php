<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 南京RXThinkCMF研发中心
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <1175401194@qq.com>
// +----------------------------------------------------------------------


// 应用公共文件

if (!function_exists('message')) {

    /**
     * 消息数组函数
     * @param string $msg 提示语
     * @param bool $success 成功标识
     * @param array $data 结果数据
     * @param int $code 状态码：0表示成功
     * @return array
     * @since 2020/9/3
     * @author 牧羊人
     */
    function message($msg = "系统繁忙，请稍候再试", $success = false, $data = [], $code = 0)
    {
        $result = ['msg' => $msg, 'data' => $data, 'success' => $success];
        if ($success) {
            // 成功统一返回0
            $result['code'] = 0;
        } else {
            // 失败状态(可配置常用状态码)
            $result['code'] = $code ? $code : -1;
        }
        return $result;
    }
}