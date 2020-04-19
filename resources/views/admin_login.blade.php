<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Đăng nhập Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{ asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="{{ asset('backend/stylesheet" href="css/font.css')}}" type="text/css"/>
<link href="{{ asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{ asset('backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng Nhập</h2>
		<?php 
			$message = Session::get('message');
			if($message){
				echo('<span class="text-alert">'.$message.'</span>');
				Session::put('message',null);
			}
		?>
        <form action="{{URL::to('admin_dashboard')}}" method="post">
			{{ csrf_field() }}
			@foreach ($errors->all() as $val )
				{{ $val }}
			@endforeach
			<input type="email"  class="ggg" name="admin_email" placeholder="E-MAIL">
			<input type="password" class="ggg" name="admin_password" placeholder="PASSWORD">
			<span><input type="checkbox" />Ghi nhớ</span>
			<h6><a href="#">Quên mật khẩu ?</a></h6>
			<input type="submit" value="Sign In" name="login">
			<div class="g-recaptcha captcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
				<br/>
			@if($errors->has('g-recaptcha-response'))
			<span class="invalid-feedback" style="display:block">
				
			</span>
			@endif
				
		</form>
		<a href="{{URl::to('/login-facebook')}}">Đăng nhập bằng Facebook</a>
</div>
</div>
<script src="{{ asset('backend/js/bootstrap.js')}}"></script>
<script src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ asset('backend/js/scripts.js')}}"></script>
<script src="{{ asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{ asset('backend/js/jquery.scrollTo.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</body>
</html>
