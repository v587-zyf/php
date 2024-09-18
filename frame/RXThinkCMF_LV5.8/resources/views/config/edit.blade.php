@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">配置分组：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'group_id|1|配置分组|name|id','data'=>DB::table("config_group")->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['group_id']) ? $info['group_id'] : 0])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">配置类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|配置类型|name|id','data'=>config("admin.config_type"),'value'=>isset($info['type']) ? $info['type'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">配置名称：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入配置名称" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">配置标题：</label>
			<div class="layui-input-inline">
				<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入配置标题" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width:625px;">
		<label class="layui-form-label">配置值：</label>
		<div class="layui-input-block">
			<textarea name="value" placeholder="请输入配置值" class="layui-textarea">{{isset($info['value']) ? $info['value'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width:625px;">
		<label class="layui-form-label">配置项：</label>
		<div class="layui-input-block">
			<textarea name="options" placeholder="请输入配置项" class="layui-textarea">{{isset($info['options']) ? $info['options'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width:625px;">
		<label class="layui-form-label">配置说明：</label>
		<div class="layui-input-block">
			<textarea name="remark" placeholder="请输入配置说明" class="layui-textarea">{{isset($info['remark']) ? $info['remark'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'是|否','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">排序：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入排序" class="layui-input" type="text">
			</div>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection

