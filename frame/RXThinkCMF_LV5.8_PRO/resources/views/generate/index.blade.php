<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

	<!-- 功能操作区一 -->
	<form class="layui-form toolbar">
		<div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label w-auto">数据表名称：</label>
				<div class="layui-input-inline">
					<input type="text" name="name" placeholder="请输入数据表名称" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-inline">
				<div class="layui-input-inline" style="width: auto;">
                    @render('WidgetComponent', ['name'=>'query|查询'])
				</div>
			</div>
		</div>
	</form>

	<!-- TABLE渲染区 -->
	<table class="layui-hide" id="tableList" lay-filter="tableList"></table>

	<!-- 操作功能区二 -->
	<script type="text/html" id="toolBar">
        @render('WidgetComponent', ['name'=>'generate|一键生成模块|layui-icon-component|layui-bg-cyan|2'])
	</script>

@endsection

