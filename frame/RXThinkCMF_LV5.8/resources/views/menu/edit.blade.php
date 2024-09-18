@extends('public.form')
@section('content')
<form class="layui-form model-form" action="">
    <input name="id" id="id" type="hidden" value="{{isset($info['id']) ? $info['id'] : 0}}">
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">菜单名称：</label>
			<div class="layui-input-inline">
				<input name="name" value="{{isset($info['name']) ? $info['name'] : ''}}" lay-verify="required" autocomplete="off" placeholder="请输入菜单名称" class="layui-input" type="text">
			</div>
		</div>
        <div class="layui-inline">
            <label class="layui-form-label">上级菜单：</label>
            <div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'pid|1|上级菜单|name|id','data'=>$menuList,'value'=>isset($info['pid']) ? $info['pid'] : 0])
            </div>
        </div>
	</div>
	<div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">菜单图标：</label>
            <div class="layui-input-inline">
                @render('IconComponent', ['name'=>'icon','value'=>isset($info['icon']) ? $info['icon'] : 'layui-icon-component'])
            </div>
        </div>
		<div class="layui-inline">
			<label class="layui-form-label">菜单类型：</label>
			<div class="layui-input-inline">
                @render('SelectComponent', ['name'=>'type|1|菜单类型|name|id','data'=>config("admin.menu_type"),'value'=>isset($info['type']) ? $info['type'] : 0])
			</div>
		</div>
	</div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">URL地址：</label>
            <div class="layui-input-inline">
                <input name="url" value="{{isset($info['url']) ? $info['url'] : ''}}" autocomplete="off" placeholder="请输入URL地址" class="layui-input" type="text">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">参数：</label>
            <div class="layui-input-inline">
                <input name="param" value="{{isset($info['param']) ? $info['param'] : ''}}" autocomplete="off" placeholder="请输入参数" class="layui-input" type="text">
            </div>
        </div>
    </div>
	<div class="layui-form-item">
		<label class="layui-form-label">权限节点：</label>
		<div class="layui-input-block">
            @render('CheckboxComponent', ['name'=>'func|name|id','data'=>config('admin.menu_func'),'value'=>''])
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">权限标识：</label>
			<div class="layui-input-inline">
				<input name="permission" value="{{isset($info['permission']) ? $info['permission'] : ''}}" autocomplete="off" placeholder="请输入权限标识" class="layui-input" type="text">
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">序号：</label>
			<div class="layui-input-inline">
				<input name="sort" value="{{isset($info['sort']) ? $info['sort'] : 125}}" lay-verify="required|number" autocomplete="off" placeholder="请输入序号" class="layui-input" type="text">
			</div>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-inline">
			<label class="layui-form-label">是否显示：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'status','title'=>'显示|隐藏','value'=>isset($info['status']) ? $info['status'] : 1])
			</div>
		</div>
		<div class="layui-inline">
			<label class="layui-form-label">公共菜单：</label>
			<div class="layui-input-inline">
                @render('SwitchComponent', ['name'=>'is_public','title'=>'是|否','value'=>isset($info['is_public']) ? $info['is_public'] : 2])
			</div>
		</div>
	</div>
	<div class="layui-form-item layui-form-text" style="width: 625px;">
		<label class="layui-form-label">备注：</label>
		<div class="layui-input-block">
			<textarea name="note" placeholder="请输入备注" rows="2" class="layui-textarea">{{isset($info['note']) ? $info['note'] : ''}}</textarea>
		</div>
	</div>
    @render('SubmitComponent', ['name'=>'submit|立即保存,close|关闭'])
</form>
@endsection
