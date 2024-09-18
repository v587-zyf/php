@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
    <input name="pid" id="pid" type="hidden" value="{{isset($info['pid']) ? $info['pid'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">城市名称：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入城市名称" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">城市级别：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'level|1|城市级别|name|id','data'=>config("admin.city_level"),'value'=>isset($info['level']) ? $info['level'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">城市编号：</label>
			<div class="layui-input-inline">
				<input name="citycode" value="{{isset($info['citycode']) ? $info['citycode'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入城市编号（区号）" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">父级编号：</label>
			<div class="layui-input-inline">
				<input name="p_adcode" value="{{isset($info['p_adcode']) ? $info['p_adcode'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入父级地理编号" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">城市经度：</label>
			<div class="layui-input-inline">
				<input name="lng" value="{{isset($info['lng']) ? $info['lng'] : ''}}" lay-verify="required|number" autocomplete="off" placeholder="请输入城市坐标中心点经度" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">城市纬度：</label>
			<div class="layui-input-inline">
				<input name="lat" value="{{isset($info['lat']) ? $info['lat'] : ''}}" lay-verify="required|number" autocomplete="off" placeholder="请输入城市坐标中心点纬度" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">地理编号：</label>
			<div class="layui-input-inline">
				<input name="adcode" value="{{isset($info['adcode']) ? $info['adcode'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入地理编号" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">排序号：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
			</div>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
