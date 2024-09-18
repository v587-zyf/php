@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">任务标题：</label>
			<div class="layui-input-inline">
				<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入任务标题" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">任务类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|任务类型|name|id','data'=>config("admin.crontab_type"),'value'=>isset($info['type']) ? $info['type'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item" style="width: 625px;">
		<label class="layui-form-label">任务脚本：</label>
		<div class="layui-input-block">
			<input name="schedule" value="{{isset($info['schedule']) ? $info['schedule'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入执行周期" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">最多执行：</label>
			<div class="layui-input-inline">
				<input name="maximums" value="{{isset($info['maximums']) ? $info['maximums'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入最多执行次数" class="layui-input" type="number">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">任务权重：</label>
			<div class="layui-input-inline">
				<input name="weigh" value="{{isset($info['weigh']) ? $info['weigh'] : 0}}" lay-verify="required" autocomplete="off" placeholder="请输入执行周期" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">开始时间：</label>
			<div class="layui-input-inline">
                @render('DateComponent', ['name'=>'start_time|开始时间|datetime','value'=>isset($info['format_start_time']) ? $info['format_start_time'] : ''])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">结束时间：</label>
			<div class="layui-input-inline">
                @render('DateComponent', ['name'=>'end_time|结束时间|datetime','value'=>isset($info['format_end_time']) ? $info['format_end_time'] : ''])
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width: 625px;">
		<label class="layui-form-label">任务内容：</label>
		<div class="layui-input-block">
			<textarea name="content" placeholder="请输入内容" class="layui-textarea">{{isset($info['content']) ? $info['content'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">任务状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'在用|禁用','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">排序：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
			</div>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
