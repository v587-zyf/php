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

use App\Rules\CardRule;

/**
 * 人员管理-验证类
 * @author zongjl
 * @date 2019/5/28
 * Class AdminRequest
 * @package App\Http\Requests
 */
class AdminRequest extends BaseRequest
{

    /**
     * 第一种：验证规则【非自定义规则验证】
     */
    protected $rule = [
        'realname' => 'required|max:20|unique:yh_admin',
    ];

//     /**
//      * 第二种：验证规则【自定义规则验证】
//      */
//     protected function rule()
//     {
//         return [
//             'realname'   => 'required|max:20|unique:yh_admin',
//             'identity' => ['required', new CardRule()],
//         ];
//     }

    /**
     * 验证提示语
     * @var unknown
     */
    protected $message = [
        'realname.required' => '名称不能为空',
        'realname.unique' => '名称已存在',
        'realname.max' => '名称最多20个字符',
        'status.required' => '状态值不能为空',
        'status.in' => '状态值不正确',
        'identity.required' => '身份证不能为空',
    ];

    /**
     * 验证场景
     */
    protected $scene = [
        'add' => 'realname',
        'edit' => 'realname',
    ];
}
