@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">站点图片：</label>
        @render('UploadImageComponent', ['name'=>'image|图片|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['image_url']) ? $info['image_url'] : ''])
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">站点名称：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入站点名称" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">站点类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|站点类型|name|id','data'=>config("admin.item_type"),'value'=>isset($info['type']) ? $info['type'] : 0])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">URL地址：</label>
			<div class="layui-input-inline">
				<input name="url" value="{{isset($info['url']) ? $info['url'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入URL地址" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">序号：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">二级域名：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'is_domain','title'=>'是|否','value'=>isset($info['is_domain']) ? $info['is_domain'] : 2])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'是|否','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width: 625px;">
		<label class="layui-form-label">备注：</label>
		<div class="layui-input-block">
			<textarea name="note" placeholder="请输入备注" class="layui-textarea">{{isset($info['note']) ? $info['note'] : ''}}</textarea>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
