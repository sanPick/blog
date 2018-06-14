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
	<script type="text/javascript" src="forget/layer.js"></script><link rel="stylesheet" href="forget/layer.css" id="" style="">
	<script type="text/javascript" src="forget/function.js"></script>
	<script src="forget/browser_judgment.js"></script>

   <script type="text/javascript" src="js/jquery.js"></script>


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
                        <div class="register-pro-tips register-pro-tips2">&nbsp;填写邮箱</div>
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
            <div class="register-box register-box_2 register-box3">
           		<div class="fs16 fc3 fstyle1 mt80 juz" id="info_text">&nbsp;</div>
            	<div class="fs16 fc3 fstyle1 mt35 juz">
            	
            	<span class="dib width20">您的邮箱：</span><span class="fc_red dib w180" id="sp_email"><?php echo $email ?></span>
            	<a class="fs14 fc_blue1 pl10" href="forget_pass">返回修改邮箱</a>
                </div>

                <dl class="mt30">
                    <dt>验证码：</dt>
                    <dd>
                        <input placeholder="请输入验证码" class="register-sr-x2" id="verify_code" value=" " type="text">
                        <div class="get-code-btn get-code-btn_2" id="get_code">获取验证码</div>
                    </dd>
                </dl>
                <dl class=" mt30" id="err_username" style="height:18px;">
                    <dd><span class="lowrong" style="display:none;"><em></em><p id="err_msg"></p></span></dd>
                </dl>
                <dl class="mt35 mb200">
                    <dd>
                        <div class="Register-btn"><a href="javascript:void(0);" onclick="do_submit();">下一步</a></div>
                    </dd>
                </dl>						
        	</div>
    </div>
</div>

<script>


//获取邮箱验证码

$('#get_code').click(function(){

	var submit_url = "send_email";
	var email = $('#sp_email').html();
	$.ajax({
		url: submit_url,
		type:'get',
		data:{email:email},
		dataType: 'json',
		success:function(result){

           if(result==1)
		   {
			   $("#info_text").html("<font color='red'>验证码已发送到您的邮箱，请输入邮件中的验证码，确保您的邮箱真实有效!</font>");
		   } else {
			   $("#err_msg").html("邮件发送失败！").parent("span").show();
		   }
		}
	});
})



function do_submit() {
	var verify_code = $("#verify_code").val();
	var email = $('#sp_email').html();

	$("#err_msg").html("").parent("span").hide();

	if(verify_code == "" || verify_code == null) {
		$("#err_msg").html("请输入验证码！").parent("span").show();
		return false;
	}

	var submit_url = "check_code";
	$.ajax({
		url: submit_url,
		type: 'get',
		data:{'code':verify_code},
		dataType: 'json',
		success:function(result){
			if(result==1) {
				location.href ='forget_pass4?email='+email;
			}else{
				$("#err_msg").html("验证码错误！").parent("span").show();
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