<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>{{$siteName}} | {{ Config::get('app.name') }}</title>
	<link href="/static/admin/assets/images/favicon.ico" rel="icon">
	<link rel="stylesheet" href="/static/admin/assets/libs/layui/css/layui.css"/>
	<link rel="stylesheet" href="/static/admin/assets/module/admin.css?v={$Think.env.app_debug?time():'2.0.7'}"/>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="/static/admin/assets/libs/layui/layui.js"></script>
	<script type="text/javascript" src="/static/admin/assets/js/common.js?v=318"></script>
	<script type="text/javascript">
		var C = '{{$app}}';
		var A = '{{$act}}';
		var mUrl = "/";
		var cUrl = "/" + C;
		var aUrl = cUrl+"/"+A;
	</script>
</head>
