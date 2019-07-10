<html>
	<head>
	<link href="/static/admis/ziyuan/css/bootstrap.min.css" rel="stylesheet" />
	</head>
		<body>
			<div>
				
			</div>
			<form action="/level" method="post" >
				选择级别<select name="catid" >
					<option>--请选择--</option>
					@foreach($res as $k=> $v)
						
							<option value="{{$v->rid}}">{{$v->role}}</option>
						
				@endforeach
				</select><br>
				管理名<input type="text" name="name"><br>
				账号<input type="text" name="username"><br>
				密码<input type="text" name="password"><br>
				
				{{csrf_field()}}
				<input type="submit" value="添加">
			</form>
		</body>
</html>