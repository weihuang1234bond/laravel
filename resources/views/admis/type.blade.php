<html>
	<head>
	</head>
	<?php
	function repeat($v){
		
		return str_repeat('&nbsp&nbsp',$v);
	}
	?>
		<body>
				<form action="/type/create">
					<select name="xuanze">
						<option>--请选择--</option>
						<option value=0>添加顶级类</option>
						@foreach($hah as $key=>$val){
								
							<option value="{{$val['id']}}"><?php echo repeat($val['level'])?>{{$val['name']}}</option>
						
						}
						@endforeach
					</select><br>
					<input type="text" name="name"> <br>
					<input type="submit" value="添加">
				</form>
		</body>
</html>