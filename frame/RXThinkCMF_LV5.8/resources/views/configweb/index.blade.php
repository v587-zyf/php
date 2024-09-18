@extends('public.form')
@section('content')
<div class="layui-tab layui-tab-brief">
  	@if ($configGroupList)
	<ul class="layui-tab-title">
        @foreach ($configGroupList as $key => $val)
		<li @if ($val['id'] == $group_id) class="layui-this" @endif><a href="/configweb/index?group_id={{$val['id']}}">{{$val['name']}}</a></li>
        @endforeach
	</ul>
	@endif
	<div class="layui-tab-content">
		<form class="layui-form model-form" action="">
            <input name="group_id" id="group_id" type="hidden" value="{{$group_id ? $group_id : 0}}">
            @if (!empty($list))
            @foreach ($list as $vo)
                @if ($vo['type'] == 'hidden')
					<!-- 隐藏域 -->
					<input name="{{$vo['name']}}" id="{{$vo['name']}}" type="hidden" value="{{isset($vo['value']) ? $vo['value'] : ''}}">
                @else
					<div class="layui-form-item">
						<label class="layui-form-label">{{$vo['title']}}：</label>
                        @if ($vo['type'] == 'text')
						<!-- 单行文本 -->
						<div class="layui-input-inline">
							<input name="{{$vo['name']}}" value="{{isset($vo['value']) ? $vo['value'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入{{$vo['title']}}" class="layui-input" type="text">
						</div>
                        @elseif ($vo['type'] == 'number')
						<!-- 数字文本 -->
						<div class="layui-input-inline">
							<input name="{{$vo['name']}}" value="{{isset($vo['value']) ? $vo['value'] : ''}}" lay-verify="required|number" autocomplete="off" placeholder="请输入{{$vo['title']}}" class="layui-input" type="text">
						</div>
                        @elseif ($vo['type'] == 'textarea')
						<!-- 多行文本 -->
						<div class="layui-input-inline">
							<textarea name="{{$vo['name']}}" placeholder="请输入{{$vo['title']}}" class="layui-textarea">{{isset($vo['value']) ? $vo['value'] : ''}}</textarea>
						</div>
                        @elseif ($vo['type'] == 'password')
						<div class="layui-input-inline">
							<!-- 密码 -->
							<input name="{{$vo['name']}}" value="{{$vo['value']}}" placeholder="请输入{{$vo['title']}}" autocomplete="off" class="layui-input" type="password">
						</div>
                        @elseif ($vo['type'] == 'radio')
						<!-- 单选框 -->
						<div class="layui-input-inline">
                            @render('RadioComponent', ['name'=>$vo['name'].'|name|id','data'=>isset($vo['format_options']) ? $vo['format_options'] : [],'value'=>isset($vo['value']) ? $vo['value'] : 0])
						</div>
                        @elseif ($vo['type'] == 'checkbox')
						<!-- 复选框 -->
						<div class="layui-input-block">
                            @render('CheckboxComponent', ['name'=>$vo['name'].'|name|id','data'=>isset($vo['format_options']) ? $vo['format_options'] : [],'value'=>isset($vo['value']) ? $vo['value'] : []])
						</div>
                        @elseif ($vo['type'] == 'select')
						<!-- 下拉框 -->
						<div class="layui-input-inline">
                            @render('SelectComponent', ['name'=>$vo['name'].'|0|'.$vo['title'].'|name|id','data'=>isset($vo['format_options']) ? $vo['format_options'] : [],'value'=>isset($vo['value']) ? $vo['value'] : 0])
						</div>
                        @elseif ($vo['type'] == 'date')
						<!-- 日期 -->
						<div class="layui-input-inline">
							<input name="{{$vo['name']}}" id="date_select" value="{{isset($vo['value']) ? $vo['value'] : ''}}" lay-verify="date" placeholder="请选择{{$vo['title']}}" autocomplete="off" class="layui-input date-icon" type="text">
						</div>
                        @elseif ($vo['type'] == 'datetime')
						<!-- 时间 -->
						<div class="layui-input-inline">
							<input name="{{$vo['name']}}" id="datetime_select" value="{{isset($vo['value']) ? $vo['value'] : ''}}" lay-verify="datetime" placeholder="请选择{{$vo['title']}}" autocomplete="off" class="layui-input date-icon" type="text">
						</div>
                        @elseif ($vo['type'] == 'image')
						<!-- 单图 -->
                            @render('UploadImageComponent', ['name'=>$vo['name'].'__upimage|图片|90x90|建议上传尺寸450x450|450x450','value'=>isset($vo['value']) ? $vo['value'] : ''])
						@elseif ($vo['type'] == 'images')
						<!-- 多图 -->
						<div class="layui-input-block">
                            @render('UploadAlbumComponent', ['name'=>$vo['name'].'__upimgs|图集|90x90|5|建议上传尺寸450x450|450x450','value'=>isset($vo['value']) ? $vo['value'] : []])
						</div>
                        @elseif ($vo['type'] == 'file')
						<!-- 单文件上传 -->
                        @elseif ($vo['type'] == 'files')
						<!-- 多文件上传 -->
                        @elseif ($vo['type'] == 'ueditor')
						<!-- 富文本编辑器 -->
						<div class="layui-input-block" style="width:800px;">
							<textarea name="$vo['name'].'__ueditor'" lay-verify="required" class="layui-textarea">{{isset($vo['value']) ? $vo['value'] : ''}}</textarea>
                            @render('EditorComponent', ['name'=>$vo['name'].'__ueditor','type'=>'default','width'=>'100%','height'=>'350'])
						</div>
                        @elseif ($vo['type'] == 'json')
						<!-- JSON -->
						@endif
					</div>
                @endif
            @endforeach
            @endif
            @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
		</form>
	</div>
</div>
@endsection
