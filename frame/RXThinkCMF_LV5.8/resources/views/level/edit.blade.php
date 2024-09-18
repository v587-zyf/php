@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
	<input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">职级名称：</label>
		<div class="layui-input-block">
			<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入职级名称" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">职级状态：</label>
		<div class="layui-input-block">
            @render('SwitchComponent', ['name'=>'status','title'=>'是|否','value'=>isset($info['status']) ? $info['status'] : 1])
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
