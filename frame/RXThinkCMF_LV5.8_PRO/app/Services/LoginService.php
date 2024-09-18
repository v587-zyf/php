<?php


namespace App\Services;


use App\Models\ActionLogModel;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Validator;

class LoginService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/26
     * LoginService constructor.
     */
    public function __construct()
    {
        $this->model = new AdminModel();
    }

    /**
     * 系统登录
     * @return array
     * @since 2020/8/26
     * @author 牧羊人
     */
    public function login($request)
    {
        // 参数
        $param = request()->all();
        // 用户名
        $username = trim($param['username']);
        // 密码
        $password = trim($param['password']);
        // 验证规则
        $rules = [
            'username' => 'required|min:2|max:20',
            'password' => 'required|min:6|max:20',
            'captcha' => ['required', 'captcha'],
        ];
        // 规则描述
        $messages = [
            'required' => ':attribute为必填项',
            'min' => ':attribute长度不符合要求',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ];
        // 验证
        $validator = Validator::make($param, $rules, $messages, [
            'username' => '用户名称',
            'password' => '登录密码'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->getMessages();
            foreach ($errors as $key => $value) {
                return message($value[0], false);
            }
        }

        // 用户验证
        $info = $this->model->getOne([
            ['username', '=', $username],
        ]);
        if (!$info) {
            return message('您的登录用户名不存在', false, 'username');
        }
        // 密码校验
        $password = get_password($password . $username);
        if ($password != $info['password']) {
            return message("您的登录密码不正确", false, "password");
        }
        // 使用状态校验
        if ($info['status'] != 1) {
            return message("您的帐号已被禁用", false);
        }

        // 设置日志标题
        ActionLogModel::setTitle("系统登录");
        ActionLogModel::record();

        // 本地SESSION存储登录信息
        session()->put("adminId", $info['id']);
        return message('登录成功', true);
    }
}
