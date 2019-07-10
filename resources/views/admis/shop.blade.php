<html>
	<head>
	<link href="/static/admis/ziyuan/css/bootstrap.min.css" rel="stylesheet" />
	</head>
		<body>
			<div>
				@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>	
					@endif
			</div>
			<form action="/shop" method="post" enctype="multipart/form-data">
				选择类别<select name="catid" >
					<option>--请选择--</option>
				@foreach($res as $k=>$v)
					<option value="{{$v['id']}}"><?php echo str_repeat('&nbsp&nbsp',$v['level'])?>{{$v['name']}}</option>
				
				@endforeach
				</select><br>
				商品名称<input type="text" name="name"><br>
				图片上传<input type="file" name="img"><br>
				价格<input type="text" name="price"><br>
				{{csrf_field()}}
				<input type="submit" value="添加">
			</form>
		</body>
</html>