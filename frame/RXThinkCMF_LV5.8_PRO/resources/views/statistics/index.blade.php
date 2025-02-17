<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>工作台</title>
	<link rel="stylesheet" href="/static/admin/assets/libs/layui/css/layui.css"/>
	<link rel="stylesheet" href="/static/admin/assets/module/admin.css?v=318"/>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!-- 正文开始 -->
<div class="layui-fluid ew-console-wrapper">

	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12 layui-col-sm6">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">同名数据统计报表</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics1">
						</div>
					</div>
				</div>
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">用户访问来源统计报表</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics2">
						</div>
					</div>
				</div>
				<div class="layui-col-md12">
					<div class="layui-card">
						<div class="layui-card-header">堆叠柱状图统计报表</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics3">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12 layui-col-sm6">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">柱状图一</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics4">
						</div>
					</div>
				</div>
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">柱状图二</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics5">
						</div>
					</div>
				</div>
				<div class="layui-col-md12">
					<div class="layui-card">
						<div class="layui-card-header">柱状图三</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics6">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12 layui-col-sm6">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">漏斗一</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics7">
						</div>
					</div>
				</div>
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">漏斗二</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics8">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12 layui-col-sm6">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">仪表盘一</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics9">
						</div>
					</div>
				</div>
				<div class="layui-col-md6">
					<div class="layui-card">
						<div class="layui-card-header">仪表盘二</div>
						<div class="layui-card-body" style="height: 300px;" id="statistics10">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- js部分 -->
<script type="text/javascript" src="/static/admin/assets/libs/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/assets/js/common.js?v=318"></script>
<script type="text/javascript" src="/static/admin/assets/libs/echarts/echarts.min.js"></script>
<script type="text/javascript" src="/static/admin/assets/libs/echarts/theme/macarons.js"></script>
<script type="text/javascript" src="/static/admin/module/think_statistics.js"></script>
</body>
</html>
