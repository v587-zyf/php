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

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 *  自定义身份证验证类(案例演示)
 * @author zongjl
 * @date 2019/5/28
 * Class CardRule
 * @package App\Rules
 */
class CardRule implements Rule
{
    /**
     * 判断验证规则是否通过
     * @param string $attribute 属性
     * @param mixed $value 值
     * @return bool 返回结果true或false
     * @author zongjl
     * @date 2019/5/28
     */
    public function passes($attribute, $value)
    {
        $cardReg = '/^\d{6}(19|20)?\d{2}(0[1-9]|1[012])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i';
        return preg_match($cardReg, $value);
    }

    /**
     * 获取验证错误信息
     * @return string 返回提示语
     * @author zongjl
     * @date 2019/5/28
     */
    public function message()
    {
        return '身份证格式不正确';
    }
}
