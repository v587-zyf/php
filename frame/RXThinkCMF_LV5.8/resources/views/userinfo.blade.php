@extends('public.form')
@section('content')
<style>
    /* 用户信息 */
    .user-info-head {
        width: 110px;
        height: 110px;
        line-height: 110px;
        position: relative;
        display: inline-block;
        border: 2px solid #eee;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        margin: 0 auto;
    }

    .user-info-head:hover:after {
        content: '\e681';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        color: #fff;
        background-color: rgba(0, 0, 0, 0.3);
        font-size: 28px;
        padding-top: 2px;
        font-style: normal;
        font-family: layui-icon;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .user-info-head img {
        width: 110px;
        height: 110px;
    }

    .user-info-list-item {
        position: relative;
        padding-bottom: 8px;
    }

    .user-info-list-item > .layui-icon {
        position: absolute;
    }

    .user-info-list-item > p {
        padding-left: 30px;
    }

    .layui-line-dash {
        border-bottom: 1px dashed #ccc;
        margin: 15px 0;
    }

    /* 基本信息 */
    #adminInfoForm .layui-form-item {
        margin-bottom: 25px;
    }

    /* 账号绑定 */
    .user-bd-list-item {
        padding: 14px 60px 14px 10px;
        border-bottom: 1px solid #e8e8e8;
        position: relative;
    }

    .user-bd-list-item .user-bd-list-lable {
        color: #333;
        margin-bottom: 4px;
    }

    .user-bd-list-item .user-bd-list-oper {
        position: absolute;
        top: 50%;
        right: 10px;
        margin-top: -8px;
        cursor: pointer;
    }

    .user-bd-list-item .user-bd-list-img {
        width: 48px;
        height: 48px;
        line-height: 48px;
        position: absolute;
        top: 50%;
        left: 10px;
        margin-top: -24px;
    }

    .user-bd-list-item .user-bd-list-img + .user-bd-list-content {
        margin-left: 68px;
    }
</style>
<div class="layui-row layui-col-space15">
    <!-- 左 -->
    <div class="layui-col-sm12 layui-col-md3">
        <div class="layui-card">
            <div class="layui-card-body" style="padding: 25px;">
                <div class="text-center layui-text">
                    <div class="user-info-head" id="adminInfoHead">
                        <img src="@if ($adminInfo['avatar']){{$adminInfo['avatar_url']}}@else'/static/admin/assets/images/head.jpg'@endif" alt=""/>
                    </div>
                    <h2 style="padding-top: 20px;">{{$adminInfo['realname']}}</h2>
                    <p style="padding-top: 8px;">{{isset($adminInfo['intro']) ? $adminInfo['intro'] : ''}}</p>
                </div>
                <div class="layui-text" style="padding-top: 30px;">
                    <div class="user-info-list-item">
                        <i class="layui-icon layui-icon-username"></i>
                        <p>{{isset($adminInfo['position_name']) ? $adminInfo['position_name'] : ''}}</p>
                    </div>
                    <div class="user-info-list-item">
                        <i class="layui-icon layui-icon-release"></i>
                        <p>{{isset($adminInfo['level_name']) ? $adminInfo['level_name'] : ''}}</p>
                    </div>
                    <div class="user-info-list-item">
                        <i class="layui-icon layui-icon-location"></i>
                        <p>{{isset($adminInfo['city_name']) ? $adminInfo['city_name'] : ''}}</p>
                    </div>
                </div>
                <div class="layui-line-dash"></div>
                <h3>标签</h3>
                <div class="layui-badge-list" style="padding-top: 6px;">
                    <span class="layui-badge layui-bg-gray">很有想法的</span>
                    <span class="layui-badge layui-bg-gray">专注设计</span>
                    <span class="layui-badge layui-bg-gray">辣~</span>
                    <span class="layui-badge layui-bg-gray">大长腿</span>
                    <span class="layui-badge layui-bg-gray">川妹子</span>
                    <span class="layui-badge layui-bg-gray">海纳百川</span>
                </div>
            </div>
        </div>
    </div>
    <!-- 右 -->
    <div class="layui-col-sm12 layui-col-md9">
        <div class="layui-card">
            <!-- 选项卡开始 -->
            <div class="layui-tab layui-tab-brief" lay-filter="adminInfoTab">
                <ul class="layui-tab-title">
                    <li class="layui-this">基本信息</li>
                    <li>账号绑定</li>
                </ul>
                <div class="layui-tab-content">
                    <!-- tab1 -->
                    <div class="layui-tab-item layui-show">
                        <form class="layui-form" id="adminInfoForm" lay-filter="adminInfoForm"
                              style="max-width: 400px;padding: 25px 10px 0 0;">
                            <div class="layui-form-item">
                                <label class="layui-form-label layui-form-required">真实名称:</label>
                                <div class="layui-input-block">
                                    <input name="realname" value="{{$adminInfo['realname']}}" class="layui-input" lay-verify="required" required/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label layui-form-required">邮箱:</label>
                                <div class="layui-input-block">
                                    <input name="email" value="{{$adminInfo['email']}}" class="layui-input" lay-verify="required" required/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">个人简介:</label>
                                <div class="layui-input-block">
                                    <textarea name="intro" placeholder="个人简介" class="layui-textarea">{{isset($adminInfo['intro']) ? $adminInfo['intro'] : ''}}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">街道地址:</label>
                                <div class="layui-input-block">
                                    <input name="address" value="{{isset($adminInfo['address']) ? $adminInfo['address'] : ''}}" class="layui-input"/>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">联系电话:</label>
                                <div class="layui-input-block">
                                    <input name="mobile" value="{{isset($adminInfo['mobile']) ? $adminInfo['mobile'] : ''}}" lay-verify="required|phone" placeholder="请输入手机号码" autocomplete="off" class="layui-input" type="tel">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-filter="adminInfoSubmit" lay-submit>更新基本信息
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- tab1 -->
                    <div class="layui-tab-item" style="padding-bottom: 20px;">
                        <div class="user-bd-list layui-text">
                            <div class="user-bd-list-item">
                                <div class="user-bd-list-lable">密保手机</div>
                                <div class="user-bd-list-text">已绑定手机：138****8293</div>
                                <a class="user-bd-list-oper">修改</a>
                            </div>
                            <div class="user-bd-list-item">
                                <div class="user-bd-list-lable">密保邮箱</div>
                                <div class="user-bd-list-text">已绑定邮箱：javaweb@vip.com</div>
                                <a class="user-bd-list-oper">修改</a>
                            </div>
                            <div class="user-bd-list-item">
                                <div class="user-bd-list-img">
                                    <i class="layui-icon layui-icon-login-qq"
                                       style="color: #3492ED;font-size: 48px;"></i>
                                </div>
                                <div class="user-bd-list-content">
                                    <div class="user-bd-list-lable">绑定QQ</div>
                                    <div class="user-bd-list-text">当前未绑定QQ账号</div>
                                </div>
                                <a class="user-bd-list-oper">绑定</a>
                            </div>
                            <div class="user-bd-list-item">
                                <div class="user-bd-list-img">
                                    <i class="layui-icon layui-icon-login-wechat"
                                       style="color: #4DAF29;font-size: 48px;"></i>
                                </div>
                                <div class="user-bd-list-content">
                                    <div class="user-bd-list-lable">绑定微信</div>
                                    <div class="user-bd-list-text">当前未绑定绑定微信账号</div>
                                </div>
                                <a class="user-bd-list-oper">绑定</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //选项卡结束 -->
        </div>
    </div>
</div>
@endsection
