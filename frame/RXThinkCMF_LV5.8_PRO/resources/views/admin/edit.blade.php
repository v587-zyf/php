@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">头像：</label>
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
			<label class="layui-form-label">人员昵称：</label>
			<div class="layui-input-inline">
				<input name="nickname" value="{{isset($info['nickname']) ? $info['nickname'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入人员昵称" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">手机号码：</label>
			<div class="layui-input-inline">
				<input name="mobile" value="{{isset($info['mobile']) ? $info['mobile'] : ''}}" lay-verify="required|phone" placeholder="请输入手机号码" autocomplete="off" class="layui-input" type="tel">
			</div>
		</div>

		<div class="layui-inline">
			<label class="layui-form-label">电子邮箱：</label>
			<div class="layui-input-inline">
				<input name="email" value="{{isset($info['email']) ? $info['email'] : ''}}" lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">身份证号：</label>
			<div class="layui-input-inline">
				<input name="identity" value="{{isset($info['identity']) ? $info['identity'] : ''}}" lay-verify="identity" placeholder="请输入身份证号" autocomplete="off" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">性别：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'gender|1|性别|name|id','data'=>config("admin.gender_list"),'value'=>isset($info['gender']) ? $info['gender'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">职级：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'level_id|1|职级|name|id','data'=>DB::table("level")->where('status','=',1)->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['level_id']) ? $info['level_id'] : 0])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">岗位：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'position_id|1|岗位|name|id','data'=>DB::table("position")->where('status','=',1)->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['position_id']) ? $info['position_id'] : 0])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">入职时间：</label>
			<div class="layui-input-inline">
                @render('DateComponent', ['name'=>'entry_date|入职时间|date','value'=>isset($info['format_entry_date']) ? $info['format_entry_date'] : ''])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">所属部门：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'dept_id|0|所属部门|name|id','data'=>$deptList,'value'=>isset($info['dept_id']) ? $info['dept_id'] : 0])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">用户名：</label>
			<div class="layui-input-inline">
				<input name="username" value="{{isset($info['username']) ? $info['username'] : ''}}" lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">密码：</label>
			<div class="layui-input-inline">
				<input name="password" placeholder="请输入密码" autocomplete="off" class="layui-input" type="password">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">所属城市：</label>
        @render('CityComponent', ['cityId'=>isset($info['district_id']) ? $info['district_id'] : 0,'limit'=>3])
	</div>
	<div class="layui-form-item" style="width: 625px;">
		<label class="layui-form-label">详细地址：</label>
		<div class="layui-input-block">
			<input name="address" value="{{isset($info['address']) ? $info['address'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入详细地址" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">所属角色：</label>
		<div class="layui-input-block">
            @render('CheckboxComponent', ['name'=>'role_ids|name|id','data'=>DB::table("role")->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['role_ids']) ? $info['role_ids'] : []])
        </div>
	</div>
	<div class="layui-form-item layui-form-text" style="width:625px;">
		<label class="layui-form-label">备注：</label>
		<div class="layui-input-block">
			<textarea name="note" placeholder="请输入备注" class="layui-textarea">{{isset($info['note']) ? $info['note'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">管理员：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'is_admin','title'=>'是|否','value'=>isset($info['is_admin']) ? $info['is_admin'] : 2])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">状态：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'在用|禁用','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
