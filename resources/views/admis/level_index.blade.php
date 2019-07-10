<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<style>
			.btn{
				float:left;
			}
	</style>	

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="/static/admis/ziyuan/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="/static/admis/ziyuan/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/static/admis/ziyuan/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="/static/admis/ziyuan/css/font-awesome.min.css" rel="stylesheet">
    <link href='/static/admis/ziyuan/css/2d7207a20f294df196f3a53cae8a0def.css' rel='stylesheet' type='text/css'>
</head>
<body>
	<table class="table table-hover table-bordered">

		<tr><a href="/level/create"><button class="btn" >添加管理</button></a></tr>
  		<tr>	
  				<th>编号</th>
  				<th>名字</th>
  				<th>级别</th>
  				<th>操作</th>
  		</tr>
  		@foreach($res as $v)
  		<tr>
  				<th>{{$v->uid}}</th>
  				<th>{{$v->name}}</th>
  				<th>{{$v->role}}</th>
  				<td><form action="/level/{{$v->uid}}" method="post"> 
						   {{csrf_field()}}
						{{method_field('DELETE')}}
				  <button type="submit" class="btn">删除</button></form>
				 
				  <form  action="/level/{{$v->uid}}/edit">
							<button type="submit" class="btn">修改</button>
							   {{csrf_field()}}
							</form>
							</td>
  		</tr>
  		@endforeach()
	</table>
	

</body>

	<!--   Core JS Files   -->
	<script src="/static/admis/ziyuan/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="/static/admis/ziyuan/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/static/admis/ziyuan/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="/static/admis/ziyuan/js/chartist.min.js"></script>



	<script src="/static/admis/ziyuan/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	
	<script type="text/javascript" src="/static/admis/ziyuan/myplugs/js/plugs.js">
		</script>
		<script type="text/javascript">
			//添加编辑弹出层
			
	</script>

</html>
