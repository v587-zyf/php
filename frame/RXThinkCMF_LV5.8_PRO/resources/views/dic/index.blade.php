<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

	<!-- 功能操作区一 -->
	<form class="layui-form toolbar">
		<div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label w-auto">字典名称：</label>
				<div class="layui-input-inline">
					<input type="text" name="name" placeholder="请输入字典名称" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-inline">
				<div class="layui-input-inline" style="width: auto;">
                    @render('WidgetComponent', ['name'=>'query|查询'])
                    @render('WidgetComponent', ['name'=>'add|添加字典'])
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

	<!-- 状态 -->
	<script type="text/html" id="statusTpl">
		<input type="checkbox" name="status" value="@{{ d.id }}" lay-skin="switch" lay-text="在用|停用" lay-filter="status" @{{ d.status == 1 ? 'checked' : '' }} >
	</script>

@endsection

