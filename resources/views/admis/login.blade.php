<html>
	<head>
	<link href="/static/admis/ziyuan/css/bootstrap.min.css" rel="stylesheet" />
	<script src="/static/admis/ziyuan/js/jquery-3.1.0.min.js"></script>
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
		  
			<form class="form-horizontal" action="/adminlogin" method="get">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">账户</label>
				<div class="controls">
				  <input type="text" id="inputEmail" placeholder="" name="name">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword" >密码</label>
				<div class="controls">
				  <input type="password" id="inputPassword" placeholder="" name="password">
				</div>
			  </div>
			 
				  
				  <button type="submit" class="btn">登陆</button>
				</div>
			  </div>
			</form>
		</body>
		<script>
				
				
				
				
		</script>
</html>