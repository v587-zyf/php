<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

<!-- 功能操作区一 -->
<form class="layui-form toolbar">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label w-auto">通知标题：</label>
            <div class="layui-input-inline">
                <input type="text" name="title" placeholder="请输入通知公告标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <!-- 通知来源 -->
        <div class="layui-inline">
            <label class="layui-form-label w-auto">通知来源：</label>
            <div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'source|0|通知来源|name|id','data'=>config("admin.notice_source"),'value'=>0])
            </div>
        </div>
        <div class="layui-inline">
            <div class="layui-input-inline" style="width: auto;">
                @render('WidgetComponent', ['name'=>'query|查询'])
                @render('WidgetComponent', ['name'=>'add|添加通知'])
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

@endsection
