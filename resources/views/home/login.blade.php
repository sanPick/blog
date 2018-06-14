<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link href="home/css/register.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/login.js" type="text/javascript"></script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<!--注册-->
<div class="wrap">
 <form id="LonginForm" name="LonginForm" action="" method="post">
	<div class="tdbModule loginPage">
		<div class="registerTitle">用户登录</div>
		<div class="registerCont">
			<ul>
				<li class="error">
				    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" />
			    </li>
				<li>
					<span class="dis">用户名：</span><input class="input" type="text" onblur="checkUsername()" name="user_name" id="user_name" maxlength="24" tabindex="1" autocomplete="off" placeholder="只能输入英文、字母、下划线"> 
				    <span id="usernameSP" data-info=""></span>

				</li>
	                
				<li>
				   <span class="dis">密码：</span><input class="input" type="password" name="password" id="password" maxlength="24" tabindex="1" autocomplete="off" onblur="checkPassword()">  
				   <span id="passwordSP" data-info="">
				</li>
				<li>
				  <span class="dis">验证码：</span><input type="text" onkeyup="checkVerify(this)" id="verify" style="width:166px;" class="input" name="yzm" data-msg="验证码" maxlength="5" tabindex="1" autocomplete="off"><span id="verifySP"></span>
						<img src="{{ URL('user/getverify') }}" id="yanzheng" alt="点击更换验证码" title="点击更换验证码" style="cursor:pointer;" class="valign" onclick="this.src+='?'">
				</li>

                <li>

					&nbsp; &nbsp; &nbsp; <span class="dis"> <input type="checkbox" name="">记住密码</span>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				   <a href="forget_pass" id="pawHide" class="blue"><font color="#663399">?忘记密码</font></a>

				</li>


				<li class="btn"> 
					<input type="button" class="radius1" value="立即登录" id="submitBtn" onclick="sublogin()" >
				</li>
				<li>
					其他账号登录：<span id="hzy_fast_login"></span>
				</li>
				<script type="text/javascript" src="http://open.51094.com/user/myscript/15940f39776563.html"></script>
			</ul>
		</div>
	</div>
 </form>
</div>

<script>
	function checkUsername(){
		var user_name = $('#user_name').val();
		var re = /^[A-Za-z0-9]+$/; 
		if (!user_name.match(re)) {
			$('#usernameSP').html('<font color="red">请输入正确用户名</font>');
			return false;
		}else{
			$('#usernameSP').html('<font color="green">√</font>');
			return true;
		}
	}
	function checkPassword(){
		var password = $('#password').val();
		var re = /^[\w]+$/; 
		if (!password.match(re)) {
			$('#passwordSP').html('<font color="red">请输入密码</font>');
			return false;
		}else{
			$('#passwordSP').html('<font color="green">√</font>');
			return true;
		}
	}
	function checkVerify(obj){
		var verify = $('#verify').val();
		var re = /^[\w]+$/
		if (!verify.match(re)) {
			$('#verifySP').html('<font color="red">请输入验证码</font>');
			return false;
		}else{
			$('#verifySP').html('<font color="green">√</font>');
			return true;
		}
	}
	function sublogin(){
		if (checkUsername() && checkPassword() && checkVerify()) {
			//所有都验证成功 去ajax请求
			var user_name = $('#user_name').val();
			var password = $('#password').val();
			var verify = $('#verify').val();
			var _token = $('#_token').val();
			$.post("{{URL('user/login')}}", { user_name: user_name, password: password , verify: verify , _token : _token},
			    function(data){
				if (data.success == 2) {
					alert(data.msg)
				}else if(data.success == 3){
					alert(data.msg)
				}else if(data.success == 0){
					alert(data.msg)
				}else{
					location.href = "{{URL('/')}}"
				}
			},'json');
		};
		
	}
</script>



<?php
include('layouts/foot.php');
?>
</body>
</html>
