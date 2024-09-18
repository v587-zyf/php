<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$siteName}} | {{ Config::get('app.name') }}</title>
    <link href="/static/admin/assets/images/favicon.ico" rel="icon">
    <link rel="stylesheet" href="/static/admin/assets/libs/layui/css/layui.css"/>
    <link rel="stylesheet" href="/static/admin/assets/module/admin.css?v=318"/>
    <link rel="stylesheet" href="/static/admin/assets/css/theme-all.css?v=318"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!-- 头部 -->
    <div class="layui-header">
        <div class="layui-logo">
            <img src="/static/admin/assets/images/logo.png"/>
            <cite>&nbsp;&nbsp;{{$nickName}}{{$version}}&emsp;</cite>
        </div>
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item" lay-unselect>
                <a ew-event="flexible" title="侧边伸缩"><i class="layui-icon layui-icon-shrink-right"></i></a>
            </li>
            <li class="layui-nav-item" lay-unselect>
                <a ew-event="refresh" title="刷新"><i class="layui-icon layui-icon-refresh-3"></i></a>
            </li>
            @if (is_array($menuList) && !empty($menuList))
            @foreach ($menuList as $key => $val)
            <li class="layui-nav-item layui-hide-xs @if ($key==0)layui-this @endif" lay-unselect><a
                    nav-bind="xt{{$key+1}}">{{$val['name']}}</a></li>
            @endforeach
            @endif
            <!-- 小屏幕下变为下拉形式 -->
            <li class="layui-nav-item layui-hide-sm layui-show-xs-inline-block" lay-unselect>
                <a>更多</a>
                <dl class="layui-nav-child">
                    <dd lay-unselect><a nav-bind="xt1">系统一</a></dd>
                    <dd lay-unselect><a nav-bind="xt2">系统二</a></dd>
                    <dd lay-unselect><a nav-bind="xt3">系统二</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item" lay-unselect>
                <a ew-event="message" title="消息">
                    <i class="layui-icon layui-icon-notice"></i>
                    <span class="layui-badge-dot"></span>
                </a>
            </li>
            <li class="layui-nav-item" lay-unselect>
                <a ew-event="note" title="便签"><i class="layui-icon layui-icon-note"></i></a>
            </li>
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
                <a ew-event="fullScreen" title="全屏"><i class="layui-icon layui-icon-screen-full"></i></a>
            </li>
            <li class="layui-nav-item layui-hide-xs" lay-unselect>
                <a ew-event="lockScreen" title="锁屏"><i class="layui-icon layui-icon-password"></i></a>
            </li>
            <li class="layui-nav-item" lay-unselect>
                <a>
                    <img src="@if (!empty($adminInfo['avatar_url'])) {{$adminInfo['avatar_url']}} @else /static/admin/assets/images/logo.png @endif" class="layui-nav-img">
                    <cite>{{$adminInfo['realname']}}</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd lay-unselect><a ew-href="/index/userinfo">个人中心</a></dd>
                    <dd lay-unselect><a ew-event="psw">修改密码</a></dd>
                    <hr>
                    <dd lay-unselect><a ew-event="logout" data-url="/login/logout">退出</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item" lay-unselect>
                <a ew-event="theme" title="主题"><i class="layui-icon layui-icon-more-vertical"></i></a>
            </li>
        </ul>
    </div>

    <!-- 侧边栏 -->
    <div class="layui-side">
        <div class="layui-side-scroll">
            @if (is_array($menuList) && !empty($menuList))
            @foreach ($menuList as $key => $val)
            <ul class="layui-nav layui-nav-tree @if ($key > 0)layui-hide @endif" nav-id="xt{{$key+1}}" lay-filter="admin-side-nav" lay-shrink="_all" style="margin: 15px 0;">
                @if (isset($val['children']) && !empty($val['children']))
                @foreach ($val['children'] as $ko => $vo)
                <li  class="layui-nav-item">
                    <a><i class="layui-icon {{$vo['icon']}}"></i>&emsp;<cite>{{$vo['name']}}</cite></a>
                    <dl class="layui-nav-child">
                        @if (isset($vo['children']) && !empty($vo['children']))
                        @foreach ($vo['children'] as $k => $v)
                        <dd><a lay-href="{{$v['url']}}">{{$v['name']}}</a></dd>
                        @endforeach
                        @endif
                    </dl>
                </li>
                @endforeach
                @endif
            </ul>
            @endforeach
            @endif
        </div>
    </div>

    <!-- 主体部分 -->
    <div class="layui-body"></div>
    <!-- 底部 -->
    <div class="layui-footer layui-text">
        copyright © 2020 <a href="http://www.rxthink.cn" target="_blank">rxthink.cn</a> all rights reserved.
        <span style="margin-left: 100px;">技术支持：<a href="tencent://message/?uin=1175401194" target="_blank">1175401194</a></span>
        <span class="pull-right">版本号：{{$version}}</span>
    </div>
</div>

<!-- 加载动画 -->
<div class="page-loading">
    <div class="ball-loader">
        <span></span><span></span><span></span><span></span>
    </div>
</div>

<!-- js部分 -->
<script type="text/javascript" src="/static/admin/assets/libs/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/assets/js/common.js?v=318"></script>
<script>
    layui.use(['index'], function () {
        var $ = layui.jquery;
        var index = layui.index;

        // 默认加载主页
        index.loadHome({
            menuPath: '/index/main',
            menuName: '<i class="layui-icon layui-icon-home"></i>'
        });

    });
</script>
</body>
</html>
