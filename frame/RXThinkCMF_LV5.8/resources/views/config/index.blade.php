<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

    <div class="layui-tab layui-tab-brief">
	@if ($configGroupList)
	<ul class="layui-tab-title">
        @foreach ($configGroupList as $val)
		<li @if ($val['id']==$group_id) class="layui-this" @endif><a href="/config/index?group_id={{$val['id']}}">{{$val['name']}}</a></li>
        @endforeach
	</ul>
    @endif
	<div class="layui-tab-content">
		<!-- 功能操作区一 -->
		<form class="layui-form toolbar">
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label w-auto">配置项名称：</label>
					<div class="layui-input-inline">
						<input type="text" name="name" placeholder="请输入配置项名称" autocomplete="off" class="layui-input">
					</div>
				</div>
				<input name="group_id" id="group_id" type="hidden" value="{{$group_id}}">
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: auto;">
                        @render('WidgetComponent', ['name'=>'query|查询'])
                        @render('WidgetComponent', ['name'=>'add|添加配置','param'=>['group_id='.$group_id]])
                        @render('WidgetComponent', ['name'=>'dall|批量删除'])
					</div>
				</div>
			</div>
		</form>

		<!-- TABLE渲染区 -->
		<table class="layui-hide" id="tableList" lay-filter="tableList"></table>

		<!-- 操作功能区二 -->
		<script type="text/html" id="toolBar">
            @render('WidgetComponent', ['name'=>'edit|编辑'])
            @render('WidgetComponent', ['name'=>'delete|删除'])
		</script>
	</div>
</div>

@endsection

