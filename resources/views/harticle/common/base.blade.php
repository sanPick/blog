<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>首页</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less" /> -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/all.js"></script>
<!--[if IE 6]> 
<script src="./js/iepng.js" type="text/javascript"></script> 
<script type="text/javascript">
   EvPNG.fix('div, ul, img, li, input,span, p');
</script>
<![endif]-->
</head>
<body>
<!-- header start -->
<div class="zxcf_top_wper">
	<div class="zxcf_top px1000 clearfix">
		 <div class="zxcf_top_l fl">
		    <img src="images/zxcf_phone.png" alt="">
		    400-027-0101(工作时间9:00-17:30)
		    <a href="#"><img src="images/zxcf_weixin.png" alt=""></a>
		    <a href="#"><img src="images/zxcf_sina.png" alt=""></a>
		    <a href="#"><img src="images/zxcf_qq.png" alt=""></a>
		 </div>
		 <div class="zxcf_top_r fr">
		 	<a href="login.html" class="curspan">立即登录</a>
		 	<span>|</span>
		 	<a href="register.html">免费注册</a>
		 	<span>|</span>
		 	<a href="problem.html">常见问题</a>
		 </div>
	</div>
</div>
<!-- end top -->
<div class="zxcf_nav_wper">
	<div class="zxcf_nav clearfix px1000">
		 <div class="zxcf_nav_l fl"><img src="images/zxcf_logo.png" alt=""></div>
		 <div class="zxcf_nav_r fr">
		 	<img src="images/zxcf_perinfo.png" alt="">
		 	<span>我的账户
		 	<img src="images/zxcf_icon01.png" alt=""></span>
		 	<ul class="zxcf_perinfo" style="display:none;">
		 		<li><a href="#">111</a></li>
		 		<li><a href="#">111</a></li>
		 		<li><a href="#">111</a></li>
		 	</ul>
		 </div>
	</div>
</div>
<div class="zxcf_menu_wper">
	<div class="zxcf_menu px1000">
		  <a href="index.html" class="zm_cura">首页</a>
		  <a href="invest.html">我要投资</a>
		  <a href="borrow.html">我要借款</a>
		  <a href="#">实时财务</a>
		  <a href="noticelist.html">新手指引</a>
		  <a href="#" style="margin-right:0;">关于我们</a>
	</div>
</div>
<!-- end  -->
<!-- end banner -->
<div class="zscf_con_wper pb30">
	<div class="zscf_con px1000">
		@yield('content')
		@yield('content1')  
	</div>
</div>
<!-- 包含页尾 -->
@include('harticle.common.footer')
</body>
</html>