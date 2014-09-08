<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CMS_enter</title>
	<link rel="stylesheet" href="css/CMS.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="enter-form">
				<p>login</p>
				<form id='form'>
				<input type="text" name='login' class="display" value="">
				<input type="text" name='name'>
				<p>password</p>
				<input type="password">
				</form>
				<div class="enter-butt">
					<p>вход</p>
				</div>
			</div>
		</div><!-- end of content -->	
	</div><!-- end of container -->
<script>
	$('.enter-butt').click(function(){
		alert('sd')
		$('.form').submit();
	})
</script>

</body>
</html>