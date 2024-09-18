@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
    <input name="pid" id="pid" type="hidden" value="{{isset($info['pid']) ? $info['pid'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">栏目名称：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入栏目名称" class="layui-input pinyin" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">所属站点：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'item_id|1|所属站点|name|id','data'=>DB::table("item")->where('status','=',1)->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['item_id']) ? $info['item_id'] : 0])
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">栏目拼音：</label>
			<div class="layui-input-inline">
				<input name="pinyin" value="{{isset($info['pinyin']) ? $info['pinyin'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入栏目拼音" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">栏目简拼：</label>
			<div class="layui-input-inline">
				<input name="code" value="{{isset($info['code']) ? $info['code'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入栏目简拼" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">有无封面：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'is_cover','title'=>'有封面|无封面','value'=>isset($info['is_cover']) ? $info['is_cover'] : 1,'hidden'=>'cover'])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">序号：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item @if (isset($info['is_cover']) && $info['is_cover']==1) layui-hide @endif cover">
		<label class="layui-form-label">栏目封面：</label>
        @render('UploadImageComponent', ['name'=>'cover|封面|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['cover_url']) ? $info['cover_url'] : ''])
	</div>
	<div class="layui-form-item layui-form-text" style="width:625px;">
		<label class="layui-form-label">栏目说明：</label>
		<div class="layui-input-block">
			<textarea name="note" placeholder="请输入栏目说明" class="layui-textarea">{{isset($info["note"]) ? $info["note"] : ''}}</textarea>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
