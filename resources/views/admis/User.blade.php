<html>
	<head>
	<link href="/static/admis/ziyuan/css/bootstrap.min.css" rel="stylesheet" />
	</head>
		<body>
				<form class="form-inline" action="/user">
					
					<!--这里的$request 有点搞不懂，那边传过来的是$request.all()，打印结果是数组-->
					  <input type="text" class="input-small" name="keyword" value="{{$request['keyword'] or ''}}">
					  <button type="submit" class="btn">搜索</button>
					</form>
				
				<table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>id</th>
                  <th>用户名</th>
                  <th>密码</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
			  <!--这里不能使用A标签，因为无法伪造请求方法-->
              @foreach($user as $row) 
                <tr class="info">
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->password}}</td>
                  <td><form action="/user/{{$row->id}}" method="post"> 
						   {{csrf_field()}}
						{{method_field('DELETE')}}
				  <button type="submit" class="btn">删除</button></form>
				 
				  <form  action="/user/{{$row->id}}/edit">
							<button type="submit" class="btn">修改</button>
							   {{csrf_field()}}
							</td>
							</form>
                </tr>
				@endforeach
              </tbody>
            </table>
			<!--appends($request) 追加参数 $request是请求参数，数组直接做参数，appends的功能？-->
			{{$user->appends($request)->render()}}
		</body>
</html>