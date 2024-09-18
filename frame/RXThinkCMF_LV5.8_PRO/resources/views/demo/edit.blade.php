@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
    <div class="layui-form-item">
        <label class="layui-form-label">头像：</label>
        @render('UploadImageComponent', ['name'=>'avatar|头像|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['avatar']) ? $info['avatar'] : ''])
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">职级名称：</label>
            <div class="layui-input-inline">
                <input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入职级名称" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">状态：</label>
            <div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'正常|停用','value'=>isset($info['status']) ? $info['status'] : 1])
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">类型：</label>
            <div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|类型|name|id','data'=>'1=京东,2=淘宝,3=拼多多,4=唯品会','value'=>isset($info['type']) ? $info['type'] : 1])
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">是否VIP：</label>
            <div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'is_vip','title'=>'是|否','value'=>isset($info['is_vip']) ? $info['is_vip'] : 2])
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">显示顺序：</label>
            <div class="layui-input-inline">
                <input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 0}}" lay-verify="required|number" autocomplete="off" placeholder="请输入显示顺序" class="layui-input" type="text">
            </div>
        </div>
    </div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
