@if (in_array($funcAuth, $funcList))
<a href="javascript:" class="layui-btn btnOption {{$funcColor}} @if ($funcType==2)layui-btn-xs @else layui-btn-small @endif btn{{ ucfirst($funcName) }}" id="{{$funcName}}" data-param='{{$param or ''}}' lay-event="{{$funcName}}">
	<i class="layui-icon {{$funcIcon}}"></i> {{$funcTitle}}
</a>
@endif
