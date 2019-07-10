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
			<form action="/shop/{{$re[0]->id}}" method="post" enctype="multipart/form-data">
				选择类别<select name="catid" >
					<option>--请选择--</option>
				@foreach($res as $k=>$v)
						
						
							
					<option value="{{$v['id']}}" <?php if($v['id']==$re[0]->catid){echo 'selected';} ?>><?php echo str_repeat('&nbsp&nbsp',$v['level'])?>{{$v['name']}}</option>
						
						
				
				@endforeach
				</select><br>
				商品名称<input type="text" name="name" value="{{$re[0]->name or ''}} "><br>
						<input type="hidden" name="id" value="{{$re[0]->id}}">
				图片上传<input type="file" name="img" >已选择 <img src="/upload/{{$re[0]->img}}" width="150px"><br>
				价格<input type="text" name="price" value="{{$re[0]->price or ''}} "><br>
				{{csrf_field()}}
				{{method_field('PUT')}}
				<input type="submit" value="修改">
			</form>
		</body>
</html>