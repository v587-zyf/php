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
 * 验证基类抽象类
 * @author zongjl
 * @date 2019/5/28
 * Class BaseRequest
 * @package App\Http\Requests
 */
abstract class BaseRequest extends AbstractRequest
{
    /** 验证规则
     * @var array 规则参数
     */
    protected $rule = [];

    /**
     * 验证提示语
     * @var array 提示语参数
     */
    protected $message = [];

    /**
     * 验证场景
     * @var array 场景参数
     */
    protected $scene = [];

    /**
     * 表单验证【备注：场景验证后期实现】
     * @param array $data 验证数据源
     * @param array $rule 验证规则
     * @param string $scene 验证场景
     * @return bool 返回结果true或false
     * @author zongjl
     * @date 2019/5/28
     */
    public function check($data = [], $rule = [], $scene = '')
    {
        if (method_exists($this, 'rule')) {
            $rule = $this->rule();
        } elseif (empty($rule)) {
            $rule = $this->rule;
        }
        $validator = \Validator::make($data, $rule, $this->message);
        if ($validator->fails()) {
            // 显示所有错误提示语
            $errors = $validator->errors()->getMessages();
            // 显示所有提示语
            $message = $validator->messages();
            // 显示所有错误
            $all = $validator->errors()->all();
            // 显示第一条错误
            $error = $validator->errors()->first();

            $this->error = $error;

            return false;
        }
        return true;
    }
}
