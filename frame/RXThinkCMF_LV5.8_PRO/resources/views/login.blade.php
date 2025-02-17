<!DOCTYPE html>
<html>
<head>
    <script>if (window !== top) top.location.replace(location.href);</script>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$siteName}} | {{ Config::get('app.name') }}</title>
    <link href="/static/admin/assets/images/favicon.ico" rel="icon">
    <link rel="stylesheet" href="/static/admin/assets/libs/layui/css/layui.css"/>
    <link rel="stylesheet" href="/static/admin/assets/module/admin.css?v=318">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background-image: url("/static/admin/assets/images/bg-login.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
        }

        body:before {
            content: "";
            background-color: rgba(0, 0, 0, .2);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .login-wrapper {
            max-width: 420px;
            padding: 20px;
            margin: 0 auto;
            position: relative;
            box-sizing: border-box;
            z-index: 2;
        }

        .login-wrapper > .layui-form {
            padding: 25px 30px;
            background-color: #fff;
            box-shadow: 0 3px 6px -1px rgba(0, 0, 0, 0.19);
            box-sizing: border-box;
            border-radius: 4px;
        }

        .login-wrapper > .layui-form > h2 {
            color: #333;
            font-size: 18px;
            text-align: center;
            margin-bottom: 25px;
        }

        .login-wrapper > .layui-form > .layui-form-item {
            margin-bottom: 25px;
            position: relative;
        }

        .login-wrapper > .layui-form > .layui-form-item:last-child {
            margin-bottom: 0;
        }

        .login-wrapper > .layui-form > .layui-form-item > .layui-input {
            height: 46px;
            line-height: 46px;
            border-radius: 2px !important;
        }

        .login-wrapper .layui-input-icon-group > .layui-input {
            padding-left: 46px;
        }

        .login-wrapper .layui-input-icon-group > .layui-icon {
            width: 46px;
            height: 46px;
            line-height: 46px;
            font-size: 20px;
            color: #909399;
            position: absolute;
            left: 0;
            top: 0;
            text-align: center;
        }

        .login-wrapper > .layui-form > .layui-form-item.login-captcha-group {
            padding-right: 135px;
        }

        .login-wrapper > .layui-form > .layui-form-item.login-captcha-group > .login-captcha {
            height: 46px;
            width: 120px;
            cursor: pointer;
            box-sizing: border-box;
            border: 1px solid #e6e6e6;
            border-radius: 2px !important;
            position: absolute;
            right: 0;
            top: 0;
        }

        .login-wrapper > .layui-form > .layui-form-item > .layui-form-checkbox {
            margin: 0 !important;
            padding-left: 25px;
        }

        .login-wrapper > .layui-form > .layui-form-item > .layui-form-checkbox > .layui-icon {
            width: 15px !important;
            height: 15px !important;
        }

        .login-wrapper > .layui-form .layui-btn-fluid {
            height: 48px;
            line-height: 48px;
            font-size: 16px;
            border-radius: 2px !important;
        }

        .login-wrapper > .layui-form > .layui-form-item.login-oauth-group > a > .layui-icon {
            font-size: 26px;
        }

        .login-copyright {
            color: #eee;
            padding-bottom: 20px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        @media screen and (min-height: 550px) {
            .login-wrapper {
                margin: -250px auto 0;
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                width: 100%;
            }

            .login-copyright {
                position: absolute;
                bottom: 0;
                right: 0;
                left: 0;
            }
        }

        .layui-btn {
            background-color: #5FB878;
            border-color: #5FB878;
        }

        .layui-link {
            color: #5FB878 !important;
        }
    </style>
</head>
<body>
<div class="login-wrapper layui-anim layui-anim-scale layui-hide">
    <form class="layui-form">
        <h2>{{$siteName}}</h2>
        <div class="layui-form-item layui-input-icon-group">
            <i class="layui-icon layui-icon-username"></i>
            <input class="layui-input" id="username" name="username" value="admin" placeholder="请输入登录账号" autocomplete="off"
                   lay-verType="tips" lay-verify="required" required/>
        </div>
        <div class="layui-form-item layui-input-icon-group">
            <i class="layui-icon layui-icon-password"></i>
            <input class="layui-input" id="password" name="password" value="123456" placeholder="请输入登录密码" type="password"
                   lay-verType="tips" lay-verify="required" required/>
        </div>
        <div class="layui-form-item layui-input-icon-group login-captcha-group">
            <i class="layui-icon layui-icon-auz"></i>
            <input class="layui-input" id="captcha" name="captcha" value="" placeholder="请输入验证码" autocomplete="off"
                   lay-verType="tips" lay-verify="required" required/>
            <img onclick="this.src='/captcha/flat?'+Math.random()" src="{{ captcha_src('flat') }}" width="130px" height="48px" class="login-captcha" alt="点击刷新验证码"/>
        </div>
        <div class="layui-form-item">
            <input type="checkbox" id="remember" name="remember" title="记住密码" lay-skin="primary" checked>
<!--            <a href="reg.html" class="layui-link pull-right">注册账号</a>-->
        </div>
        <div class="layui-form-item">
            <button class="layui-btn layui-btn-fluid" lay-filter="loginSubmit" lay-submit>登录</button>
        </div>
<!--        <div class="layui-form-item login-oauth-group text-center">-->
<!--            <a href="javascript:;"><i class="layui-icon layui-icon-login-qq" style="color:#3492ed;"></i></a>&emsp;-->
<!--            <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat" style="color:#4daf29;"></i></a>&emsp;-->
<!--            <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo" style="color:#CF1900;"></i></a>-->
<!--        </div>-->
    </form>
</div>
<div class="login-copyright">copyright © 2020 rxthink.cn all rights reserved.</div>

<!-- js部分 -->
<script type="text/javascript" src="/static/admin/assets/libs/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/assets/js/common.js?v=318"></script>
<script>
    layui.use(['layer', 'form'], function () {
        var $ = layui.jquery;
        var layer = layui.layer;
        var form = layui.form;
        $('.login-wrapper').removeClass('layui-hide');

        // 登录事件
        form.on('submit(loginSubmit)', function (data) {
            // 设置按钮文字“登录中...”及禁止点击状态
            // $(data.elem).attr('disabled', true).text('登录');

            // 网络请求
            var loadIndex = layer.load(2);
            $.ajax({
                type: "POST",
                url: '/login/login',
                data: JSON.stringify(data.field),
                contentType: "application/json",
                dataType: "json",
                beforeSend: function () {
                    // TODO...
                },
                success: function (res) {
                    layer.close(loadIndex);
                    if (res.success) {
                        layer.msg('登录成功', {
                            icon: 1,
                            time: 1500
                        });

                        // 延迟3秒
                        setTimeout(function () {
                            // 跳转后台首页
                            window.location.href = "/index/index";
                        }, 2000);

                        return false;
                    } else {
                        layer.msg(res.msg, {icon: 2, anim: 6});

                        // 延迟3秒恢复可登录状态
                        setTimeout(function () {
                            // // 设置按钮状态为“登陆”
                            // var login_text = $(data.elem).text().replace('中', '');
                            // // 设置按钮为可点击状态
                            // $(data.elem).text(login_text).removeAttr('disabled');
                        }, 3000);
                    }
                },
                error: function () {
                    layer.msg("AJAX请求异常");
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
