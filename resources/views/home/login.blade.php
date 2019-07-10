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
		  
			<form class="form-horizontal" action="/user" method="post">
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
			  <div class="control-group">
				<label class="control-label" for="inputPassword">重复密码</label>
				<div class="controls">
				
				  <input type="password" id="inputPassword" placeholder="" name="repassword">
				</div>
				</div>
		验证&nbsp码<input type="text" name="wencode"><img src="/home/captcha" style="margin:5px" onclick="this.src=this.src+'?a=1'"><br>
		手机号码<input type="text" id="phone"  name="phone">
				
				<div class="control-group">
				<label class="control-label" for="inputCode"></label>
				<div class="controls">
				
				 <input type="text" name="Code"> <input type="button" id="inputCode" placeholder=""  value="获取验证码">
				</div>
				</div>
				 {{csrf_field()}}
			  </div>
			  <div class="control-group">
				<div class="controls">
				  
				  <button type="submit" class="btn">注册</button>
				</div>
			  </div>
			</form>
		</body>
		<script>
				
				
				$('#inputCode').click(function(){
					
					$.get('/code?',{phone:$('#phone').val()},function(data){
						if(data->taus==1){
							setInterval(function(){
								$('#inputCode').attr('display',true);
							},60000);
							setTime(function(){
								$('#inputCode').attr('display',false);
							},60000)
						}
					});
				});
				
		</script>
</html>