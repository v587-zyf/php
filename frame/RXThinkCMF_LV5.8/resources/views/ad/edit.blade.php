@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">广告封面：</label>
        @render('UploadImageComponent', ['name'=>'cover|封面|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['cover_url']) ? $info['cover_url'] : ''])
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">广告位：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'sort_id|1|广告位|name|id','data'=>DB::table("ad_sort")->where('mark','=',1)->orderBy("sort")->get()->toArray(),'value'=>isset($info['sort_id']) ? $info['sort_id'] : 0])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">URL地址：</label>
			<div class="layui-input-inline">
				<input name="url" value="{{isset($info['url']) ? $info['url'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入地址链接" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">广告标题：</label>
			<div class="layui-input-inline">
				<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入广告标题" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">广告类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|广告位|name|id','data'=>config("admin.ad_type"),'value'=>isset($info['type']) ? $info['type'] : 0])
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width:625px;">
		<label class="layui-form-label">广告描述：</label>
		<div class="layui-input-block">
			<textarea name="description" placeholder="请输入广告位描述" class="layui-textarea">{{isset($info['description']) ? $info['description'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item" style="width:1000px;">
		<label class="layui-form-label">广告内容：</label>
		<div class="layui-input-block">
			<textarea name="content" id="content" lay-verify="required" class="layui-textarea">{{isset($info['content']) ? $info['content'] : ''}}</textarea>
            @render('EditorComponent', ['name'=>'content','type'=>'default','width'=>'100%','height'=>'350'])
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
