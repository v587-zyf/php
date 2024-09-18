<?php


namespace App\Services;

use App\Helpers\Jwt;
use App\Models\ActionLogModel;
use App\Models\UserModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Ramsey\Uuid\Uuid;

/**
 * 登录服务类
 * @author 牧羊人
 * @since 2020/11/10
 * Class LoginService
 * @package App\Services
 */
class LoginService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/10
     * LoginService constructor.
     */
    public function __construct()
    {
        $this->model = new UserModel();
    }

    /**
     * 获取验证码
     * @author 牧羊人
     * @since 2020/11/10
     */
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色25,25,112
        $builder->setBackgroundColor(255, 255, 255);
        // 设置倾斜角度
        $builder->setMaxAngle(25);
        // 设置验证码后面最大行数
        $builder->setMaxBehindLines(10);
        // 设置验证码前面最大行数
        $builder->setMaxFrontLines(10);
        // 设置验证码颜色
        $builder->setTextColor(230, 81, 175);
        // 可以设置图片宽高及字体
        $builder->build($width = 165, $height = 45, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入 cache，10分钟后过期
        $key = Uuid::uuid1()->toString();
        $this->model->setCache($key, $phrase, Carbon::now()->addMinutes(10));
        // 组装接口数据
        $data = [
            'key' => $key,
            'captcha' => $builder->inline(),
        ];
        return message("操作成功", true, $data);
    }

    /**
     * 系统登录
     * @return mixed
     * @since 2020/11/10
     * @author 牧羊人
     */
    public function login()
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
            'captcha' => ['required'],
        ];
        // 规则描述
        $messages = [
            'required' => ':attribute为必填项',
            'min' => ':attribute长度不符合要求',
            'captcha.required' => '验证码不能为空',
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
        // 验证码校验
        $key = trim($param['key']);
        $captcha = $this->model->getCache($key);
        if (strtolower($captcha) != strtolower($param['captcha'])) {
            return message("请输入正确的验证码", false);
        }

        // 用户验证
        $info = $this->model->getOne([
            ['username', '=', $username],
        ]);
        if (!$info) {
            return message('您的登录用户名不存在', false);
        }
        // 密码校验
        $password = get_password($password . $username);
        if ($password != $info['password']) {
            return message("您的登录密码不正确", false);
        }
        // 使用状态校验
        if ($info['status'] != 1) {
            return message("您的帐号已被禁用", false);
        }

        // 设置日志标题
        ActionLogModel::setTitle("登录系统");
        ActionLogModel::record();

        // JWT生成token
        $jwt = new Jwt();
        $token = $jwt->getToken($info['id']);

        // 结果返回
        $result = [
            'access_token' => $token,
        ];
        return message('登录成功', true, $result);
    }

    /**
     * 退出系统
     * @return array
     * @since 2020/11/12
     * @author 牧羊人
     */
    public function logout()
    {
        // 清空SESSION值
        session()->put("userId", null);
        // 记录退出日志
        ActionLogModel::setTitle("注销系统");
        // 创建退出日志
        ActionLogModel::record();
        return message();
    }

}
