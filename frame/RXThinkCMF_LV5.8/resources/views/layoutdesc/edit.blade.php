@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">所属站点：</label>
		<div class="layui-input-block">
            @render('SelectComponent', ['name'=>'item_id|1|站点名称|name|id','data'=>DB::table("item")->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['item_id']) ? $info['item_id'] : 0])
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">位置描述：</label>
		<div class="layui-input-block">
			<input name="loc_desc" value="{{isset($info['loc_desc']) ? $info['loc_desc'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入位置描述" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">位置编号：</label>
		<div class="layui-input-block">
			<input name="loc_id" value="{{isset($info['loc_id']) ? $info['loc_id'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入位置编号" class="layui-input" type="text">
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
