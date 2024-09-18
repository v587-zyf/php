<?php


namespace App\Http\Controllers;


use App\Models\AdminModel;
use App\Models\AdminRomModel;
use Illuminate\Http\Request;

/**
 * 系统主页-控制器
 * @author 牧羊人
 * @since 2020/8/29
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Backend
{

    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/27
     * IndexController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new AdminModel();
    }

    /**
     * 系统主页
     * @return
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function index()
    {
        // 获取导航菜单
        $adminRomModel = new AdminRomModel();
        $menuList = $adminRomModel->getPermissionList($this->adminId);
        return view('index', ['menuList' => $menuList]);
    }

    /**
     * 欢迎页
     * @return view
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function main()
    {
        return view('main');
    }

    /**
     * 更新个人信息
     * @return view|array
     * @since 2020/9/2
     * @author 牧羊人
     */
    public function userInfo()
    {
        if (IS_POST) {
            // 参数
            $param = request()->all();
            // 真实姓名
            $realname = trim($param['realname']);
            // 邮箱
            $email = trim($param['email']);
            // 个人简介
            $intro = trim($param['intro']);
            // 街道地址
            $address = trim($param['address']);
            // 联系电话
            $mobile = trim($param['mobile']);
            $data = [
                'id' => $this->adminId,
                'realname' => $realname,
                'email' => $email,
                'intro' => $intro,
                'address' => $address,
                'mobile' => $mobile,
            ];
            $result = $this->model->edit($data);
            if (!$result) {
                return message("信息保存失败", false);
            }
            return message();
        }
        $adminInfo = $this->model->getInfo($this->adminId);
        return view("userinfo", ['adminInfo' => $adminInfo]);
    }

    /**
     * 更新密码
     * @return array
     * @since 2020/9/2
     * @author 牧羊人
     */
    public function updatePwd()
    {
        // 参数
        $param = request()->all();
        // 原密码
        $oldPassword = trim($param['oldPassword']);
        if (!$oldPassword) {
            return message("原密码不能为空", false);
        }
        // 新密码
        $newPassword = trim($param['newPassword']);
        if (!$newPassword) {
            return message("新密码不能为空", false);
        }
        // 确认密码
        $rePassword = trim($param['rePassword']);
        if (!$rePassword) {
            return message("确认密码不能为空", false);
        }
        if ($newPassword != $rePassword) {
            return message("两次输入的密码不一致", false);
        }
        if (get_password($oldPassword . $this->adminInfo['username']) != $this->adminInfo['password']) {
            return message("原始密码不正确", false);
        }
        // 设置新密码
        $data = [
            'id' => $this->adminId,
            'password' => get_password($newPassword . $this->adminInfo['username']),
        ];
        $result = $this->model->edit($data);
        if (!$result) {
            return message("修改失败", false);
        }
        return message("修改成功");
    }
}
