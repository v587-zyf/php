@extends('public.form')
@section('content')
<form class="layui-form model-form" action="" style="width:80%;">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<label class="layui-form-label">文章封面：</label>
        @render('UploadImageComponent', ['name'=>'cover|封面|90x90|建议上传尺寸450x450|450x450','value'=>isset($info['cover_url']) ? $info['cover_url'] : ''])
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">文章标题：</label>
		<div class="layui-input-block">
			<input name="title" value="{{isset($info['title']) ? $info['title'] : ''}}" lay-verify="title" autocomplete="off" placeholder="请输入文章标题(最少10个字)" class="layui-input" type="text">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">文章摘要：</label>
		<div class="layui-input-block">
			<textarea name="guide" placeholder="请输入文章摘要" lay-verify="required" class="layui-textarea">{{isset($info['guide']) ? $info['guide'] : ''}}</textarea>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">文章图集：</label>
		<div class="layui-input-block">
            @render('UploadAlbumComponent', ['name'=>'imgs|图集|90x90|20|建议上传尺寸450x450|450x450','value'=>isset($info['imgsList']) ? $info['imgsList'] : []])
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">文章内容：</label>
		<div class="layui-input-block">
            <textarea name="content" id="content" lay-verify="required" class="layui-textarea">{{isset($info['content']) ? $info['content'] : ''}}</textarea>
            @render('EditorComponent', ['name'=>'content','type'=>'default','width'=>'100%','height'=>'350'])
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">文章状态：</label>
		<div class="layui-input-inline">
            @render('SwitchComponent', ['name'=>'status','title'=>'立即发布|保存草稿','value'=>isset($info['status']) ? $info['status'] : 1])
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
