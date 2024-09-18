@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">友链名称：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入友链名称" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">URL地址：</label>
			<div class="layui-input-inline">
				<input name="url" value="{{isset($info['url']) ? $info['url'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入友链URL地址" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">友链类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|友链类型|name|id','data'=>config("admin.link_type"),'value'=>isset($info['type']) ? $info['type'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">所属平台：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'platform|1|所属平台|name|id','data'=>config("admin.link_platform"),'value'=>isset($info['platform']) ? $info['platform'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">友链形式：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'form|1|友链形式|name|id','data'=>config("admin.link_form"),'value'=>isset($info['form']) ? $info['form'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'在用|停用','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-hide image">
		<label class="layui-form-label">友链图片：</label>
        @render('UploadImageComponent', ['name'=>'image|图片|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['image_url']) ? $info['image_url'] : ''])
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">序号：</label>
		<div class="layui-input-inline">
			<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
