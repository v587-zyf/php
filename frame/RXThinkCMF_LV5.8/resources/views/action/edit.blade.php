@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">行为标识：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入行为标识" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">行为名称：</label>
		<div class="layui-input-inline">
			<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入行为名称" class="layui-input" type="text">
		</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">行为类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|行为类型|name|id','data'=>config("admin.action_type"),'value'=>isset($info['type']) ? $info['type'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">执行类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'execution|1|执行类型|name|id','data'=>config("admin.action_execution"),'value'=>isset($info['execution']) ? $info['execution'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">所属模块：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'module|1|所属模块|name|id','data'=>DB::table("menu")->where('type', 3)->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['module']) ? $info['module'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">行为状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'在用|停用','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">行为规则：</label>
		<div class="layui-input-block">
			<input name="rule" value="{{isset($info['rule']) ? $info['rule'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入行为规则" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">日志规则：</label>
		<div class="layui-input-block">
			<input name="log" value="{{isset($info['log']) ? $info['log'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入日志规则" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">行为描述：</label>
		<div class="layui-input-block">
			<textarea name="description" placeholder="请输入行为描述" class="layui-textarea">{{isset($info['description']) ? $info['description'] : ''}}</textarea>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
