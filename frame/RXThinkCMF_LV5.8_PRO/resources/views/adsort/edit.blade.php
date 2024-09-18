@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">广告位：</label>
		<div class="layui-input-block">
			<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入广告位名称" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">选择站点：</label>
        @render('ItemComponent', ['itemId'=>isset($info['item_id']) ? $info['item_id'] : 0,'cateId'=>isset($info['cate_id']) ? $info['cate_id'] : 0,'limit'=>2])
    </div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">广告位置：</label>
			<div class="layui-input-inline">
				<input name="loc_id" value="{{isset($info['loc_id']) ? $info['loc_id'] : 0}}" lay-verify="required" autocomplete="off" placeholder="请输入广告位置" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">投放平台：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'platform|1|投放平台|name|id','data'=>config("admin.ad_platform"),'value'=>isset($info['platform']) ? $info['platform'] : 1])
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-form-text">
		<label class="layui-form-label">描述：</label>
		<div class="layui-input-block">
			<textarea name="description" placeholder="请输入广告位描述" class="layui-textarea">{{isset($info['description']) ? $info['description'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">序号：</label>
		<div class="layui-input-inline">
			<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
