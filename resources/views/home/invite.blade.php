<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
<link rel="stylesheet" type="text/css" href="home/css/jquery.datetimepicker.css"/>
<link href="home/css/base.css" rel="stylesheet">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="text/javascript"></script>
<script src="home/js/jquery-1.js" type="text/javascript"></script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>

<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1200" height="96"></a></div>
    <div id="personal-left" class="personal-left">
    <!--用户中心菜单-->
    <?php include('layouts/user_ucenter.php') ?>
    <!--用户中心菜单end-->
    </div>
    <style>
		        /*获取验证码*/
				a.hqyzm{ float:left; background:#ea524a; width:125px; height:35px; line-height:35px; font-size:14px; margin-left:6px; text-align:center; color:#fff; border-radius:2px;}
				a.hqyzm:hover{color:#fff;background:#ff8882;}
				/*获取验证码后在倒计时中的样式*/
				a.hqyzmAfter{float:left; background:#c0c0c0; width:125px; height:35px; line-height:35px; font-size:14px; margin-left:6px; text-align:center; color:#fff; border-radius:2px;}
	   </style>
    <script type="text/javascript">
			//<![CDATA[
			    var flag = false;
				function sCode(xhr, status, args, args2) {
					if (!args.validationFailed) {
						$("#sendCode").hide();
						$("#sendCodeGrey").show();
						/* if(flag && $("#sendCode").is(":hidden")){
							return;
						} */
						flag = true;
						var mobileNumber = $("#form\\:mobileNumber").val().replace(/(^\s*)|(\s*$)/g,"");
						if("dx" == args2){
							$("#mobileMsg").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
							$("#authCodeMsg").css({"display": ""});
							$("#authCodeMsg2").css({"display": "none"});
						}else if("yy" == args2){
							$("#mobileMsg2").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
							$("#authCodeMsg").css({"display": "none"});
							$("#authCodeMsg2").css({"display": ""});
						}
						timer("sendAuthCodeBtn1", {
							"count" : 60,
							"animate" : true,
							initTextBefore : "后可重新操作",
							initTextAfter : "秒",
							callback:function(){
								$("#sendCode").show();
								$("#sendCodeGrey").hide();
								flag = false;
								$("#authCodeMsg").css({"display": "none"});
								$("#authCodeMsg2").css({"display": "none"});
							}
						}).begin();
					}
				}
				 //验证验证码是否为空
		       function phoneValidate()
		       {
	        	   var authCode=$("#form\\:authCode").val();
	        	   var nullFlag=(authCode=="");
	        	   if(nullFlag)
		   			{
		   				$("#form\\:authCode_message").remove();
		   				var $span = $("<span id=form\:authCode_message class=error>请输入验证码</span>");
		   				$("#authCodeErrorDiv").append($span);
		   				return false;
		   			}
		   			
	        	   return true;
		       }
		       $(document).ready(function(){
		  			var investorValiCodeError = $("#investorValiCodeError").val();
		  			if(investorValiCodeError.length > 0){
		  				$("#form\\:formauthCode_message").remove();
		  	   			var $span = $("<span id=form\:formauthCode_message class=error>"+investorValiCodeError+"</span>");
		  	   			$("#authCodeErrorDiv").append($span);
		  			}
		  	   });
		          
		          
		          
	         function showSpan(op)
	         {
					$("body").append("<div id='mask'></div>");
					$("#mask").addClass("mask").css("display","block");
		
					$("#"+op).css("display","block");
			 }

			function displaySpan(op){
					$("#mask").css("display","none");
					$("#"+op).css("display","none");
			}
			//]]>
		</script>
    <input id="investorValiCodeError" type="hidden" name="investorValiCodeError">
    <div class="personal-main">
      <div class="personal-pay">
        <h3><i>邀请注册</i></h3>
        <form id="form" name="form" method="post" action="" enctype="application/x-www-form-urlencoded">

          <div class="pay-form">
            <h6>请把以下链接复制发给好友，注册成功返还积分</h6>

           <!--注册-->
<div class="wrap">
<?php
$user_id=base64_encode(session('user_id'));

?>

		<div class="tdbModule loginPage">
			<div class="registerTitle">邀请码</div>
			
			<div class="registerCont">
				<ul>
					<li>
					<div class="info-1"> <form action=""  class="form-x">
						<span class="dis"></span><input  class="pay-txt"  id="ma" type="text" >
						</form></div>
					</li>
					<li class="btn">
						<input type="button" id="invite"  class="btn-paykh" onClick="copyinput()" user_id="<?php echo $user_id?>" value="复制邀请码">
					</li>
				</ul>
			</div>
		</div>
		<div class="registerCont">
			<h6>您的总积分为：<span id="jifen"><?php echo $jifen; ?></span>积分，1000积分可兑换50￥红包</h6>

					<li class="btn">
						<input type="button"  id="my_red"  class="btn-paykh"  value="兑换">
					</li>
			</div>
		</div>

<h3><i>邀请列表</i></h3>
    <div class="investnote-list">
        <div class="investnote-contitle"> <span class="investnote-w1 fb">时间</span> <span class="investnote-w2 fb">邀请人</span> <span class="investnote-w3 fb">积分</span>  </div>
        <ul>
            @foreach($arr as $v)
            <li style="line-height:20px; heignt:30px;"><span class="investnote-w1" style="line-height:20px; heignt:30px;">{{date('Y-m-d',$v->invite_time)}}</span>
			<span class="investnote-w2" style="line-height:20px; heignt:30px;">{{$v->user_name}}</span>
			<span class="investnote-w3" style="line-height:20px; heignt:30px;">+200</span></li>
            @endforeach
        </ul>
    </div>
</div>
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
<script>
	$(function(){

       var str="<?php echo 'http://'.$host.'/register?user_id='.$user_id; ?>";
       $('#ma').val(str);
	})

function copyinput()
{
	var input=document.getElementById("ma");//input的ID值
	input.select().createTextRange(); //选择对象
	document.execCommand("Copy"); //执行浏览器复制命令
} 



$('#my_red').click(function(){
	var jifen = $('#jifen').text()
	var _token = '<?php echo csrf_token() ?>'
	$.ajax({
		type:'post',
		data:{jifen:jifen,_token:_token},
		url:'invite',
		dataType:'json',
		success:function(data){
			if(data.msg == '1' ){
		            art.dialog({
		            title: '兑换成功',
		            content: '红包兑换码：'+data.code+'，请复制以后前往兑换',
		            resize:true,//可拉伸弹出框开关
		            fixed:true,
		            lock:true,//锁屏
		            opacity:.7,//锁屏背景透明度
		            background:'#000',//锁屏背景颜色
		            drag:false,//拖动开关
		            width:350,
		            height:50,
		            okVal: "确认",
		            ok: function(){

		                window.location.href = 'my_red_packets?user_id='+"<?php echo session('user_id') ?>"
		            }
		        });				
			}else if(data.msg == '0'){

			}else if(data.msg == '2'){
		            art.dialog({
		            title: '积分不足',
		            content: '努力邀请小伙伴赚取积分哦！',
		            resize:true,//可拉伸弹出框开关
		            fixed:true,
		            lock:true,//锁屏
		            opacity:.7,//锁屏背景透明度
		            background:'#000',//锁屏背景颜色
		            drag:false,//拖动开关
		            width:350,
		            height:50,
		            okVal: "确认",
		            ok: function(){

		                
		            }
		        });					
			}


		}
	})


})

</script>

 

      </div>
    
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php
include('layouts/foot.php');
?>

</body>
</html>
