@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">字典标题：</label>
			<div class="layui-input-inline">
				<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入字典标题" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">字典标签：</label>
			<div class="layui-input-inline">
				<input name="tag" value="{{isset($info['tag']) ? $info['tag'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入字典标签" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">字典类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type_id|1|字典类型|name|id','data'=>DB::table("dic_type")->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['type_id']) ? $info['type_id'] : 0])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'在用|停用','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item" style="width: 625px;">
		<label class="layui-form-label">字典值：</label>
		<div class="layui-input-block">
			<textarea name="value" placeholder="请输入字典值,例如(性别：1:男 2:女 3:未知)" class="layui-textarea">{{isset($info['value']) ? $info['value'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item" style="width: 625px;">
		<label class="layui-form-label">字典备注：</label>
		<div class="layui-input-block">
			<textarea name="note" placeholder="请输入字典备注" class="layui-textarea">{{isset($info['note']) ? $info['note'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">显示顺序：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
			</div>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
