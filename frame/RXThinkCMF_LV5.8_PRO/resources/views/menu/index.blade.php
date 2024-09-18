<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

	<!-- 功能操作区一 -->
	<form class="layui-form toolbar">
       <div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label w-auto">菜单名称：</label>
				<div class="layui-input-inline">
					<input type="text" name="name" id="keywords" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
				</div>
			</div>
            <div class="layui-inline">
                <div class="layui-input-inline" style="width: auto;">
                    @render('WidgetComponent', ['name'=>'query|查询'])
                    @render('WidgetComponent', ['name'=>'add|添加菜单'])
                    @render('WidgetComponent', ['name'=>'dall|批量删除'])
                    @render('WidgetComponent', ['name'=>'expand|全部展开'])
                    @render('WidgetComponent', ['name'=>'collapse|全部折叠'])
               </div>
           </div>
       </div>
	</form>

	<!-- TREE渲染区 -->
	<table id="tableList" class="layui-hide" lay-filter="tableList"></table>

	<!-- 操作功能区二 -->
	<script type="text/html" id="toolBar">
        @render('WidgetComponent', ['name'=>'edit|编辑'])
        @render('WidgetComponent', ['name'=>'delete|删除'])
        @{{#  if(d.type <= 3){ }}
        @render('WidgetComponent', ['name'=>'addz|添加'])
        @{{#  } }}
	</script>

@endsection
