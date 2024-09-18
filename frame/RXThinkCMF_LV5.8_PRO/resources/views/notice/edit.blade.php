@extends('public.form')
@section('content')
<form class="layui-form model-form" action="" style="width: 70%;">
	<input name="id" id="id" type="hidden" value="{$info.id|default=0}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">通知标题：</label>
			<div class="layui-input-inline">
				<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入通知标题" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">通知来源：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'source|1|通知来源|name|id','data'=>config("admin.notice_source"),'value'=>isset($info['source']) ? $info['source'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">是否置顶：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'is_top','title'=>'已置顶|未置顶','value'=>isset($info['is_top']) ? $info['is_top'] : 2])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">阅读量：</label>
			<div class="layui-input-inline">
				<input name="view_num" value="{{isset($info['view_num']) ? $info['view_num'] : 0}}" lay-verify="required|number" autocomplete="off" placeholder="请输入阅读量" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">发布状态：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'status|1|发布状态|name|id','data'=>config("admin.notice_status"),'value'=>isset($info['status']) ? $info['status'] : 3])
			</div>
		</div>
		<div class="layui-inline layui-hide publishTime">
			<label class="layui-form-label">发布时间：</label>
			<div class="layui-input-inline">
                @render('DateComponent', ['name'=>'publish_time|出生日期|datetime','value'=>isset($info['format_publish_time']) ? $info['format_publish_time'] : ''])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">通知内容：</label>
		<div class="layui-input-block">
            <textarea name="content" id="content" lay-verify="required" class="layui-textarea">{{isset($info['content']) ? $info['content'] : ''}}</textarea>
            @render('EditorComponent', ['name'=>'content','type'=>'default','width'=>'100%','height'=>'350'])
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
