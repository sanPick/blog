

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

	<link type="text/css" rel="stylesheet" href="forget/basic.css">
	<link type="text/css" rel="stylesheet" href="forget/index.css">
	<link type="text/css" rel="stylesheet" href="forget/iconfont.css">
	<link type="text/css" rel="stylesheet" href="forget/layer.css">
	<link type="text/css" rel="stylesheet" href="forget/call.css">

	<script type="text/javascript" src="forget/jquery-1.js"></script>
	<script type="text/javascript" src="forget/jquery.js"></script>
	<script type="text/javascript" src="forget/layer.js"></script><link rel="stylesheet" href="forget/layer.css" id="" style="">
	<script type="text/javascript" src="forget/function.js"></script>
	<script src="forget/browser_judgment.js"></script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<div class="center"><!--填写账户信息 -->

    	<div class="register-pro-box">
        	<ul class="ofh">
            	<li class="register-pro1 on">
                	<div class="register-pro-pic register-pro-pic0">
                        <div class="register-pro-num-box">
                            <div class="register-pro-num">1</div>
                        </div>
                        <div class="register-pro-tips register-pro-tips2 register-pro-tips3">&nbsp;填写邮箱</div>
                    </div>
                </li>

                <li class="register-pro2 register-pro2-0">
                	<div class="register-pro-pic2">
                        <div class="register-pro-num-box">
                            <div class="register-pro-num">2</div>
                        </div>
                        <div class="register-pro-tips register-pro-tips0">验证码&nbsp;</div>
                    </div>
                </li>


                <li class="register-pro3">
                	<div class="register-pro-pic3">
                        <div class="register-pro-num-box">
                            <div class="register-pro-num">3</div>
                        </div>
                        <div class="register-pro-tips">重置密码</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="register-box register-box0 register-box2 register-box_1 register-box_3">
        	<dl>
            	<dt>邮箱：</dt>
                <dd>
                	<input placeholder="请输入邮箱" class="register-sr-x1" id="user_tel" type="tel">
                </dd>
            </dl>
            <dl class="mt30">
            	<dt>验 证 码：</dt>
                <dd>
					<input placeholder="不区分大小写" type="text" id="verify" style="width:166px;" class="input" name="yzm" data-msg="验证码" maxlength="5" tabindex="1" autocomplete="off"><span id="verifySP"></span>
					<img src="{{ URL('user/getverify') }}" id="yanzheng" alt="点击更换验证码" title="点击更换验证码" style="cursor:pointer;" class="valign" onclick="this.src+='?'">
				</dd>


            </dl>
            <dl class="mt30" style="height:18px;">
                <dd><span class="lowrong" style="display:none;"><em></em><p id="err_msg"></p></span></dd>
            </dl>
            <dl class="mt35">
                <dd>
                	<div class="Register-btn"><a href="javascript:void(0);" onclick="do_submit();">下一步</a></div>
                </dd>
            </dl>						
        </div>
<script>

function do_submit() {
	var user_tel = $("#user_tel").val();
	var verify = $('#verify').val();

	$("#err_msg").html("").parent("span").hide();
	
	if(user_tel == "" || user_tel == null) {
		$("#err_msg").html("请输入您的邮箱！").parent("span").show();
		$("#user_tel").focus();
		return false;
	}
	
	//验证手机号码
	var phone_validate = /^((13)|(14)|(15)|(18)|(17))[0-9]{9}$/;
	var email_validate = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	
	if(user_tel.indexOf("@") >= 0) {
		if(!email_validate.test(user_tel)){
			$("#err_msg").html("请填写正确的邮箱！").parent("span").show();
			$("#user_tel").focus();
			return false;
		}
	} else {
		if(!phone_validate.test(user_tel)){
			$("#err_msg").html("请输入正确的邮箱！").parent("span").show();
			$("#user_tel").focus();
			return false;
		}
	}


	if(verify == "" || verify == null) {
		$("#err_msg").html("请输入验证码！").parent("span").show();
		$("#user_tel").focus();
		return false;
	}
	
	
	var submit_url = "forget_pass_do";

	$.ajax({
		url: submit_url,
		type: 'get',
		data:{'email':user_tel,'verify':verify},
		dataType: 'json',
		success:function(result){
			if(result == 1) {
				location.href ='forget_pass3?email='+user_tel;
			}
			if(result == 2) {
				$("#err_msg").html("验证码错误！").parent("span").show();
			}

			if(result == 0) {
				$("#err_msg").html("该邮箱未注册！").parent("span").show();
			}
		}
	});


}



</script>
</div>
<style>
	.friend_link {
		padding: 0px 0 20px 0;
		float: right !important;
		text-align: center;
	}
	.friend_link a {
		margin: 0 14px 0 14px;
		text-align: center;
	}
	.friend-dl {
		width: 380px !important;
	}
</style>

<?php
include('layouts/foot.php');
?>

</body></html>

