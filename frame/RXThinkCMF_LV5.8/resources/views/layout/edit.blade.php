@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
    <input name="type_id" id="type_id" type="hidden" value="{{isset($info['type_id']) ? $info['type_id'] : 0}}">
	<div class="layui-form-item" style="width: 500px;">
		<label class="layui-form-label">推荐标题：</label>
		<div class="layui-input-block">
			<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入推荐标题" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">页面位置：</label>
        @render('LayoutComponent', ['itemId'=>isset($info['item_id']) ? $info['item_id'] : 0,'locId'=>isset($info['loc_id']) ? $info['loc_id'] : 0,'limit'=>2])
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">推荐类型：</label>
		<div class="layui-input-inline">
            @render('SelectComponent', ['name'=>'type|1|推荐类型|name|id','data'=>config("admin.layout_type"),'value'=>isset($info['type']) ? $info['type'] : 0])
		</div>
		<div class="layui-input-inline">
			<input name="type_desc" value="{{isset($info['type_desc']) ? $info['type_desc'] : ''}}" lay-verify="" autocomplete="off" placeholder="请选择模块对象" class="layui-input" type="text" readonly="">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">布局图片：</label>
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
