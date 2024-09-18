@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">用户头像：</label>
        @render('UploadImageComponent', ['name'=>'avatar|头像|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['avatar_url']) ? $info['avatar_url'] : ''])
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">真实姓名：</label>
			<div class="layui-input-inline">
				<input name="realname" value="{{isset($info['realname']) ? $info['realname'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入真实姓名" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">用户昵称：</label>
			<div class="layui-input-inline">
				<input name="nickname" value="{{isset($info['nickname']) ? $info['nickname'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入用户昵称" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">性别：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'gender|1|性别|name|id','data'=>config("admin.gender_list"),'value'=>isset($info['gender']) ? $info['gender'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">手机号码：</label>
			<div class="layui-input-inline">
				<input name="mobile" value="{{isset($info['mobile']) ? $info['mobile'] : ''}}" lay-verify="required|phone" placeholder="请输入手机号码" autocomplete="off" class="layui-input" type="tel">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">出生日期：</label>
			<div class="layui-input-inline">
                @render('DateComponent', ['name'=>'birthday|出生日期|date','value'=>isset($info['format_birthday']) ? $info['format_birthday'] : ''])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">是否启用：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'正常|禁用','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">所属城市：</label>
        @render('CityComponent', ['cityId'=>isset($info['district_id']) ? $info['district_id'] : 0,'limit'=>3])
	</div>
	<div class="layui-form-item" style="width:625px;">
		<label class="layui-form-label">个人简介：</label>
		<div class="layui-input-block">
			<textarea name="intro" placeholder="请输入个人简介" class="layui-textarea">{{isset($info['intro']) ? $info['intro'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item" style="width:625px;">
		<label class="layui-form-label">个性签名：</label>
		<div class="layui-input-block">
			<textarea name="signature" placeholder="请输入个性签名" class="layui-textarea">{{isset($info['signature']) ? $info['signature'] : ''}}</textarea>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
