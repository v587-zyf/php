<!-- 引入基类模板 -->
@extends('public.layout')

<!-- 主体部分 -->
@section('content')

    <!-- 功能操作区一 -->
    <form class="layui-form toolbar">
        <div class="layui-form-item">

            <!-- 职级名称 -->
            <div class="layui-inline">
                <label class="layui-form-label w-auto">职级名称：</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="请输入职级名称" autocomplete="off" class="layui-input">
                </div>
            </div>

            <!-- 状态 -->
            <div class="layui-inline">
                <label class="layui-form-label w-auto">状态：</label>
                <div class="layui-input-inline">
                    @render('SelectComponent', ['name'=>'status|0|状态|name|id','data'=>'1=正常,2=停用','value'=>0])
                </div>
            </div>

            <!-- 类型 -->
            <div class="layui-inline">
                <label class="layui-form-label w-auto">类型：</label>
                <div class="layui-input-inline">
                    @render('SelectComponent', ['name'=>'type|0|类型|name|id','data'=>'1=京东,2=淘宝,3=拼多多,4=唯品会','value'=>0])
                </div>
            </div>

            <!-- 是否VIP -->
            <div class="layui-inline">
                <label class="layui-form-label w-auto">是否VIP：</label>
                <div class="layui-input-inline">
                    @render('SelectComponent', ['name'=>'is_vip|0|是否VIP|name|id','data'=>'1=是,2=否','value'=>0])
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline" style="width: auto;">
                    @render('WidgetComponent', ['name'=>'query|查询'])
                    @render('WidgetComponent', ['name'=>'add|添加演示'])
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
        <input type="checkbox" name="status" value="@{{ d.id }}" lay-skin="switch" lay-text="正常|停用" lay-filter="status" @{{ d.status == 1 ? 'checked' : '' }} >
    </script>

    <!-- 是否VIP -->
    <script type="text/html" id="is_vipTpl">
        <input type="checkbox" name="is_vip" value="@{{ d.id }}" lay-skin="switch" lay-text="是|否" lay-filter="is_vip" @{{ d.is_vip == 1 ? 'checked' : '' }} >
    </script>

@endsection
