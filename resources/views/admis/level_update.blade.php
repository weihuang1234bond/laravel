<html>
	<head>
	<link href="/static/admis/ziyuan/css/bootstrap.min.css" rel="stylesheet" />
	</head>
		<body>
			<div>
				
			</div>
			<form action="/level/{{session('id')}}" method="post">
				选择级别<select name="catid">
					
					<option>--请选择--</option>
					@foreach($re as $v)
				<option value="{{$v->rid}}" @if ($v->rid==$res[0]->rid) selected @endif/  >{{$v->role}}</option>
						
						
					@endforeach
				</select><br>
				管理名<input type="text" name="name" value="{{$res[0]->name}}"><br>
				
				<?php $q=1;?>
				
				板块权限:@foreach($lala as $key=> $val)
						
						
						@foreach($val as $kk=>$vall)
						
						
						
					<input type="checkbox" name="{{$key}}" value="{{$vall}}" @if($q==$mei[$key][$kk])? checked @endif>{{$sm[$key][$kk]}}
					
					{{$q++}}
					@endforeach
				@endforeach
				<br>
				{{csrf_field()}}
				{{method_field('PUT')}}

				<input type="submit" value="修改">
			</form>
		</body>
</html>