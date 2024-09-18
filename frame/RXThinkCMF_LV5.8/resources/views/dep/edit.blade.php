@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
    <input name="pid" id="pid" type="hidden" value="{{isset($info['pid']) ? $info['pid'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">部门名称：</label>
		<div class="layui-input-block">
			<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入部门名称" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">部门类型：</label>
		<div class="layui-input-block">
            @render('SwitchComponent', ['name'=>'type','title'=>'公司|部门','value'=>isset($info['type']) ? $info['type'] : 2])
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">有无子级：</label>
		<div class="layui-input-block">
            @render('SwitchComponent', ['name'=>'has_child','title'=>'有子级|无子级','value'=>isset($info['has_child']) ? $info['has_child'] : 1])
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">序号：</label>
		<div class="layui-input-block">
			<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
