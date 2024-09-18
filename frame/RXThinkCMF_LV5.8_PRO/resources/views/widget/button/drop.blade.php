@if (in_array($funcAuth, $funcList))
<a class="layui-btn layui-btn-danger layui-btn-xs btnDel" lay-event="del" title="{{$funcTitle}}"><i class="layui-icon">&#xe640;</i>{{$funcTitle}}</a>
@endif
