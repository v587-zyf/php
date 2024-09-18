<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

	<!-- 功能操作区一 -->
	<form class="layui-form">
		<div class="layui-form">
			<div class="layui-form-item">
				<div class="layui-inline">
					<div class="layui-input-inline" style="width: auto;">
                        @render('WidgetComponent', ['name'=>'backup|立即备份|layui-icon-set-fill|layui-btn-normal|1'])
                        @render('WidgetComponent', ['name'=>'optimize|优化表|layui-icon-component|layui-btn-warm|1'])
                        @render('WidgetComponent', ['name'=>'repair|修复表|layui-icon-util|layui-bg-cyan|1'])
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- TABLE渲染区 -->
	<table class="layui-hide" id="tableList" lay-filter="tableList"></table>

	<!-- 操作功能区二 -->
	<script type="text/html" id="toolBar">
        @render('WidgetComponent', ['name'=>'optimize|优化表|layui-icon-component|layui-btn-warm|2'])
        @render('WidgetComponent', ['name'=>'repair|修复表|layui-icon-util|layui-bg-cyan|2'])
	</script>

@endsection

