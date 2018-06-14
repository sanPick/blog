<!DOCTYPE html>
<html><head>
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
	<script type="text/javascript" src="forget/layer.js"></script><link rel="stylesheet" href="forget/layer.css" id="layui_layer_skinlayercss" style="">
	<script type="text/javascript" src="forget/function.js"></script>
	<script src="forget/browser_judgment.js"></script>
</head>
<body>

<?php
include('layouts/header.blade.php');
?>



<div class="center"><!--填写账户信息 -->
<div class="bg_color4 pt40">
	<div class="wl mtauto bg_color2 pb30">
    	<div class="register-pro-box">
        	<ul class="ofh">
            	<li class="register-pro1 on">
                	<div class="register-pro-pic">
                        <div class="register-pro-num-box">
                            <div class="register-pro-num">1</div>
                        </div>
                        <div class="register-pro-tips register-pro-tips2">&nbsp;填写手机号/邮箱</div>
                    </div>
                </li>
                <li class="register-pro2 register-pro2-0 on">
                	<div class="register-pro-pic2">
                        <div class="register-pro-num-box">
                            <div class="register-pro-num">2</div>
                        </div>
                        <div class="register-pro-tips">验证码&nbsp;</div>
                    </div>
                </li>
                <li class="register-pro3 on">
                	<div class="register-pro-pic3">
                        <div class="register-pro-num-box">
                            <div class="register-pro-num">3</div>
                        </div>
                        <div class="register-pro-tips">重置密码</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="register-box register-box2">
        	<dl>
            	<dt>新密码：</dt>
                <dd>
                	<input placeholder="请输入新密码" class="register-sr-x1" id="new_pwd" type="password">
					<input type="hidden" value="<?php echo $email ?>" class="hide_email">
                </dd>
            </dl>
            <dl class="mt30">
            	<dt>重复密码：</dt>
                <dd>
                	<input placeholder="请输入新密码" class="register-sr-x1" id="re_pwd" type="password">
                </dd>

            </dl>
            <dl class="mt30" style="height:18px;">
                <dd><span class="lowrong" style="display:none;"><em></em><p id="err_msg"></p></span></dd>
            </dl>
            <dl class="mt35">
                <dd>
                	<div class="Register-btn"><a href="javascript:void(0);" onclick="do_submit();">提交</a></div>
                </dd>
            </dl>
        </div>
    </div>
</div>

<script>
function do_submit() {
	var new_pwd = $("#new_pwd").val();
	var re_pwd = $("#re_pwd").val();
	var email=$('.hide_email').val();
	
	if(new_pwd == "" || new_pwd == null) {
		$("#err_msg").html("请输入新密码").parent("span").show();
		return false;
	}
	
	if(new_pwd != re_pwd) {
		$("#err_msg").html("两次密码不一致").parent("span").show();
		return false;
	}
	
	
	$("#err_msg").html("").parent("span").hide();
	var submit_url = "up_pwd";
	$.ajax({
		url: submit_url,
		type: 'get',
		data:{'new_pwd':new_pwd, 're_pwd':re_pwd,email:email},
		dataType: 'json',
		success:function(result){
			if(result==1) {
				var url = "login";
				layer.alert('重置密码成功！', {icon:1});
				location.href ='login';

			} else {
				$("#err_msg").html("密码重置失败！").parent("span").show();
			}
		}
	});
	
}

//回车事件
$(this).keydown(function (e){
	if(e.which == "13"){
		do_submit();
	}
})

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