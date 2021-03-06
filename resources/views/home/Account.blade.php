
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
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="text/javascript"></script>
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
        <?php include('layouts/user_ucenter.php') ?>
    </div>
    <script type="text/javascript">
			//<![CDATA[
				function showSpan(op){
					$("#updateMonbileForm\\:updateMonbileFormauthCode").val("");
					if(op=='alert-updateEmail'){
						var bool = $("#authenticationMobile").val();
						if(bool=='true'){
							$("#alert-main").css("display","none");
							$("#alert-main2").css("display","block");
						}
					}
					$("body").append("<div id='mask'></div>");
					$("#mask").addClass("mask").css("display","block");

					$("#"+op).css("display","block");
				}

				function displaySpan(op){
					clearInputValue(); 
					$("#mask").css("display","none");
					$("#"+op).css("display","none");
				}
				
				function displaySpan2(){
					$("#mask").css("display","none");
					$("#alert-updateEmail").css("display","none");
					
					$("body").append("<div id='mask'></div>");
					$("#mask").addClass("mask").css("display","block");
		
					$("#alert-checkMobile").css("display","block");
				}
		var flag = false;
		//验证码发送消息提示
		function sCode(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode").hide();
				$("#sendCodeGrey").show();
				/* if(flag && $("#sendCode").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#checkMonbileForm\\:mobileNumber").val().replace(/(^\s*)|(\s*$)/g,"");
				if("dx" == args2){
					$("#mobileMsg7").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg7").css({"display": ""});
					$("#authCodeMsg8").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg8").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg7").css({"display": "none"});
					$("#authCodeMsg8").css({"display": ""});
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
						$("#authCodeMsg7").css({"display": "none"});
						$("#authCodeMsg8").css({"display": "none"});
					}
				}).begin();
			}
		}
		//验证码发送消息提示
		function s2Code(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode1").hide();
				$("#sendCodeGrey1").show();
				/* if(flag && $("#sendCode1").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#updateMonbileForm\\:mobileNumber2").val().replace(/(^\s*)|(\s*$)/g,"");
				if("dx" == args2){
					$("#mobileMsg3").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg3").css({"display": ""});
					$("#authCodeMsg4").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg4").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg3").css({"display": "none"});
					$("#authCodeMsg4").css({"display": ""});
				}
				timer("sendAuthCodeBtn2", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode1").show();
						$("#sendCodeGrey1").hide();
						flag = false;
						$("#authCodeMsg3").css({"display": "none"});
						$("#authCodeMsg4").css({"display": "none"});
					}
				}).begin();
			}
		}
		
		//验证码发送消息提示
		function s3Code(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode2").hide();
				$("#sendCodeGrey2").show();
				/* if(flag && $("#sendCode2").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#mobile").val();
				if("dx" == args2){
					$("#mobileMsg5").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg5").css({"display": ""});
					$("#authCodeMsg6").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg6").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg5").css({"display": "none"});
					$("#authCodeMsg6").css({"display": ""});
				}
				timer("sendAuthCodeBtn3", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode2").show();
						$("#sendCodeGrey2").hide();
						flag = false;
						$("#authCodeMsg5").css({"display": "none"});
						$("#authCodeMsg6").css({"display": "none"});
					}
				}).begin();
			}
		}
		//清空验证码
		function clearValue(element)
		{
			$(element).val("");
		}
		
		function getUrlParam(){
			/* var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");	 
			var r = window.location.search.substr(1).match(reg);	 
			if (r!=null) return unescape(r[2]); 
			return null; */
			var type=""
			return type;
		}
		function clearInputValue(){
			$("#checkMonbileForm\\:mobileNumber").val(""); 
			$("#checkMonbileForm\\:authCode").val(""); 
			$("#checkMonbileForm\\:mobileNumber_message").remove();
			$("#checkMonbileForm\\:authCode_message").remove();
			
			//修改手机号-验证原手机号
			$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
			$("#checkOldMobileForm\\:checkOldMobileFormauthCode").val("");
			
			$("#updateMonbileForm\\:mobileNumber2").val(""); 
			$("#updateMonbileForm\\:updateMonbileFormauthCode").val(""); 
			$("#updateMonbileForm\\:mobileNumber2_message").remove();
			$("#updateMonbileForm\\:updateMonbileFormauthCode_message").remove();
			
			$("#changeEmailForm\\:newEmail").val(""); 
			$("#changeEmailForm\\:changeEmailFormauthCode").val(""); 
			$("#changeEmailForm\\:newEmail_message").remove();
			$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
			
			//修改密码提示消息
			$("#updatePassForm\\:oldPassword").val(""); 
			$("#updatePassForm\\:password").val(""); 
			$("#updatePassForm\\:repassword").val(""); 
			
			$("#updatePassForm\\:oldPassword_message").remove();
			$("#updatePassForm\\:password_message").remove();
			$("#repassword_message").remove();
		}
		//]]>
		</script>
    <style type="text/css">
			.txt235{height:38px;border:1px solid #ccc;}
		
		</style>
    <script type="text/javascript">
			//<![CDATA[
			$(function(){
				var  type = getUrlParam();
				if(type =='2'){
					showSpan('alert-updateMobile');//绑定手机号
				}else if(type =='3'){
					showSpan('alert-activeEmail');//激活邮箱
				}else if(type =='4'){
					showSpan('alert-activeEmailMsg');//激活邮箱后提醒
				}else if(type=='5')
				{
					showSpan('alert-checkOldMobile');
				}
				else if(type=='6')
				{
					showSpan('alert-updateEmail');
				}
				//修改手机时，不显示原手机号
				document.getElementById("updateMonbileForm:mobileNumber2").value = '';
				//进度条样式
				if($.browser.mozilla) { 
					$("i[class='grzxbg level3']").css(
							{
							backgroundPosition: "0px -550px",
							border:"none",
							margin :"37px 0px 0px 20px",
							height:"17px"
							}
					);
			     }else { 
			    	 $("i[class='grzxbg level3']").css(
			    			{
			    				border:"none",
			    				margin :"37px 0px 0px 20px",
			    				height:"17px"
			    			}
			    	);
			    	$("i[class='grzxbg level3']").css({
			    		"background-position-x":"0px",
			    		"background-position-y":"-550px"
			    	});
		         }
				//$("#activeEmail\\:activeEmailemail").attr({"readOnly":"true"});
				"";
			});
			//]]>
			</script>
    <div class="personal-main">
      <div class="personal-zhsz">
        <h3><i>账户设置</i></h3>
        <div class="personal-level"> <span class="wzd">您的账户完整度</span>
          @if($arr->over_info==1)
            <i class="grzxbg level2" style="border: none; margin: 37px 0px 0px 20px; height: 17px; background-position: 120px -550px;"></i><span class="state">[高]</span> <i id="zhwzd" class="markicon fl mt35"></i><span class="arrow-personal">请尽快完成账户安全设置，以确保您的账户安全</span><span class="grzxbg icon-personal"></span> </div>

      @else
            <i class="grzxbg level2" style="border: none; margin: 37px 0px 0px 20px; height: 17px; background-position: 0px -550px;"></i><span class="state">[中]</span> <i id="zhwzd" class="markicon fl mt35"></i><span class="arrow-personal">请尽快完成账户安全设置，以确保您的账户安全</span><span class="grzxbg icon-personal"></span> </div>
        @endif
        <ul>
          <li><i class="grzxbg p-right"></i><span class="zhsz-span1">手机号</span><span class="zhsz-span2">{{ substr_replace($arr->tel,'****',3,4)  }}</span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="showSpan('alert-checkOldMobile')">更改</a></span></li>
          <input type="hidden" value="false" id="authenticationMobile">
          <li>
          @if($arr->over_info==1)
            <i class="grzxbg p-right"></i><span class="zhsz-span1">身份认证</span><span class="zhsz-span2">已认证</span>
                  @else
            <i class="grzxbg p-danger"></i><span class="zhsz-span1">身份认证</span><span class="zhsz-span2">未认证</span>
                  @endif
          <span class="zhsz-span3"><a href="evip">认证</a></span></li>
          <li> <i class="grzxbg p-right"></i> <span class="zhsz-span1">电子邮箱</span> <span class="zhsz-span2">{{ substr_replace($arr->email,'****',4,4) }}</span> <span class="zhsz-span3"> <a href="#" onclick="showSpan('alert-updateEmail')">更改</a> </span> </li>
          <li><i class="grzxbg p-right"></i><span class="zhsz-span1">登录密码</span><span class="zhsz-span2"></span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="showSpan('alert-updatePass')">更改</a></span></li>
          <li>
					@if(empty($arr->pay_pass))
					<i class="grzxbg p-danger"></i>
					<span class="zhsz-span1">支付密码</span><span class="zhsz-span2"></span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="showSpan('alert-updatezhifu')">设置</a></span></li>
					@else
					@if($arr->is_lock==1)
					<i class="grzxbg p-danger"></i>
					@else
					<i class="grzxbg p-right"></i>
					@endif
					<span class="zhsz-span1">支付密码</span><span class="zhsz-span2"></span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="showSpan('alert-updatezhifu')">
					@if($arr->is_lock==1)
					解锁
					@else
					更改
					@endif
					</a></span></li>
					@endif
				
        </ul>
      </div>
    </div>
    <script type="text/javascript">
			//<![CDATA[
			           //验证手机号是否为空
			           function checkCheckMobileFormMoible()
			           {
			        	   var mobile=$("#checkMonbileForm\\:mobileNumber").val();
			        	   var nullFlag=(mobile=="");
			        	   if(nullFlag)
				   			{
				   				$("#checkMonbileForm\\:mobileNumber_message").remove();
				   				var $span = $("<span id=checkMonbileForm\:mobileNumber_message class=error>请输入手机号</span>");
				   				$("#mobileNumberErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var mobileError=$("#mobileNumberErrorDiv").text();
				   				if(mobileError=='请输入手机号')
				   				{
				   					$("#checkMonbileForm\\:mobileNumber_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证验证码是否为空
			           function checkCheckMobileFormAuthCode()
			           {
			        	   var authCodeRegex="^[0-9]{4,4}$";
			        	   var authCode=$("#checkMonbileForm\\:authCode").val();
			        	   var nullFlag=(authCode=="");
			        	   if(nullFlag)
				   			{
				   				$("#checkMonbileForm\\:authCode_message").remove();
				   				var $span = $("<span id=checkMonbileForm\:authCode_message class=error>请输入验证码</span>");
				   				$("#authCodeErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var authCodeError=$("#authCodeErrorDiv").text();
				   				if(authCodeError=='请输入验证码')
				   				{
				   					$("#checkMonbileForm\\:authCode_message").remove();
				   				}
				   			}
			        	   var authCodePattern=new RegExp(authCodeRegex);
			        	   var legalFlag=authCodePattern.test(authCode);
			        	   if(!legalFlag)
				   			{
				   				$("#checkMonbileForm\\:authCode_message").remove();
				   				var $span = $("<span id=checkMonbileForm\:authCode_message class=error>验证码错误，请重新输入!</span>");
				   				$("#authCodeErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var authCodeError=$("#authCodeErrorDiv").text();
				   				if(authCodeError=='请输入验证码')
				   				{
				   					$("#checkMonbileForm\\:authCode_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           function checkMobileAll()
			           {
			        	   checkCheckMobileFormMoible();
			        	   checkCheckMobileFormAuthCode();
			        	   var mobileErrorFlag=($("#mobileNumberErrorDiv").text().length == 0);
			        	   var authCodeErrorFlag=($("#authCodeErrorDiv").text().length == 0);
			        	   return mobileErrorFlag&&authCodeErrorFlag;
			           }
			           $(document).ready(function(){
			   			var bdsjValiCodeError = $("#bdsjValiCodeError").val();
			   			if(bdsjValiCodeError.length > 0){
			   				$("#authCodeErrorDiv").html("");
			   				$("#updateMonbileFormauthCodeErrorDiv").html("");
			   				var $span = $("<span id=checkMonbileForm\:authCode_message class=error>"+bdsjValiCodeError+"</span>");
			   				if(!$("#authCodeErrorDiv").is(":hidden")){
			   					$("#authCodeErrorDiv").append($span);
			   				}else{
			   					$("#updateMonbileFormauthCodeErrorDiv").append($span);
			   				}
			   			}
			   		});
			//]]>
		</script>
    <div class="alert-450" id="alert-checkMobile" style="display:none;">
      <div class="alert-title">
        <h3>绑定手机</h3>
        <span class="alert-close" onclick="displaySpan('alert-checkMobile')"></span></div>
      <div class="alert-main">
        <form id="checkMonbileForm" name="checkMonbileForm" method="post" action="#" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="checkMonbileForm" value="checkMonbileForm">
          <ul>
            <li>
              <label class="txt-name">手机号</label>
              <span class="txt240">
              <input id="checkMonbileForm:mobileNumber" type="text" name="checkMonbileForm:mobileNumber" autocomplete="off" value="15055100139" class="txt240" maxlength="35" onblur="jsf.util.chain(this,event,'return checkCheckMobileFormMoible()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入手机号">
              </span>
              <div id="mobileNumberErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">验证码</label>
              <input id="checkMonbileForm:authCode" type="text" name="checkMonbileForm:authCode" class="txt110" maxlength="8" onblur="jsf.util.chain(this,event,'return checkCheckMobileFormAuthCode()','mojarra.ab(this,event,\'blur\',0,\'@this\')')" placeholder="请输入验证码">
              <span id="sendCode"><a id="checkMonbileForm:sendAuthCodeBtn" href="#" onclick="jsf.util.chain(this,event,'return validateBindPhoneSMS();','PrimeFaces.ab({source:this,event:\'action\',process:\'checkMonbileForm:sendAuthCodeBtn checkMonbileForm:mobileNumber\',oncomplete:function(xhr,status,args){sCode(xhr, status, args, \'dx\');}}, arguments[1]);');return false" class="btn-code">免费获取校验码</a><a id="checkMonbileForm:sendAuthCodeBtn4" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','@this checkMonbileForm:mobileNumber',0,{'onevent':sCode2});return false" class="btn-code">免费获取校验码</a> </span> <span id="sendCodeGrey" style="display:none;"> <a href="#" id="sendAuthCodeBtn1" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span> </li>
            <li>
              <div id="authCodeErrorDiv" class="errorplace"></div>
              <div id="authCodeMsg7" style="display:none;" class="yzmplace"> 验证码已发送到您手机<span id="mobileMsg7"></span>，如果收不到短信，请 <a id="checkMonbileForm:sendAuthCodeBtn11" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'checkMonbileForm:sendAuthCodeBtn11 checkMonbileForm:mobileNumber',oncomplete:function(xhr,status,args){sCode(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg8" style="display:none;" class="yzmplace"> 您的手机<span id="mobileMsg8"></span>将在60秒内收到语音电话，请接听！ </div>
              <input type="submit" name="checkMonbileForm:j_idt119" value="确　认" class="btn-ok txt-right" onclick="return checkMobileAll()">
            </li>
          </ul>
        </form>
      </div>
    </div>
    <script type="text/javascript">
			//<![CDATA[
			   //验证码发送消息提示
		function s7Code(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode7").hide();
				$("#sendCodeGrey7").show();
				/* if(flag && $("#sendCode7").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#checkOldMobileForm\\:oldMobileNumber").html().replace(/(^\s*)|(\s*$)/g,"");
				if("dx" == args2){
					$("#mobileMsg").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg").css({"display": ""});
					$("#authCodeMsg2").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg2").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg").css({"display": "none"});
					$("#authCodeMsg2").css({"display": ""});
				}
				timer("sendAuthCodeBtn7", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode7").show();
						$("#sendCodeGrey7").hide();
						flag = false;
						$("#authCodeMsg").css({"display": "none"});
						$("#authCodeMsg2").css({"display": "none"});
					}
				}).begin();
			}
		}  
		//验证验证码是否为空
        function checkOldMobileFormAuthCode()
        {
		   var legalRegex="^[0-9]{4,4}$";
     	   var authCode=$("#checkOldMobileForm\\:checkOldMobileFormauthCode").val();
     	   var nullFlag=(authCode=="");
     	   if(nullFlag)
	   			{
	   				$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   				var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>请输入验证码</span>");
	   				$("#checkOldMobileFormauthCodeErrorDiv").append($span);
	   				return false;
	   			}
	   			else
	   			{
	   					$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   					var legalPattern=new RegExp(legalRegex);
	   					var legalFlag=legalPattern.test(authCode);
	   					if(!legalFlag)
	   					{
	   						$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   		   				var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>验证码错误，请重新输入</span>");
	   		   				$("#checkOldMobileFormauthCodeErrorDiv").append($span);
	   		   				return false;
	   					}
	   					else
	   					{
	   						$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   					}
	   			}
     	   return true;
        }	           
		function checkCheckOldMobileAll()
		{
			
			return checkOldMobileFormAuthCode();
		}
		$(document).ready(function(){
			var valiCodeError = $("#valiCodeError").val();
			if(valiCodeError.length > 0){
				$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   			var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>"+valiCodeError+"</span>");
	   			$("#checkOldMobileFormauthCodeErrorDiv").append($span);
			}
		});
			//]]>
		</script>
    <input id="valiCodeError" type="hidden" name="valiCodeError">
    <div class="alert-450" id="alert-checkOldMobile" style="display:none;">
      <div class="alert-title">
        <h3>修改手机</h3>
        <span class="alert-close" onclick="displaySpan('alert-checkOldMobile')"></span></div>
      <div class="alert-main">
        <form id="checkOldMobileForm" name="checkOldMobileForm" method="post" action="#" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          <input type="hidden" name="checkOldMobileForm" value="checkOldMobileForm">
          <ul>
            <li>
              <label class="txt-name">原手机号</label>
              <label id="checkOldMobileForm:oldMobileNumber" class="txt240"> {{ substr_replace($arr->tel,'****',3,4) }}</label>
            </li>
            <li>
              <label class="txt-name">验证码</label>
              <input id="checkOldMobileForm:checkOldMobileFormauthCode" type="text" name="checkOldMobileForm:checkOldMobileFormauthCode" class="a_code txt110" maxlength="8" onblur="jsf.util.chain(this,event,'return checkOldMobileFormAuthCode()','mojarra.ab(this,event,\'blur\',0,\'@this\')')" onfocus="clearValue(this)" placeholder="请输入验证码">
              <span id="sendCode7"><a id="tel" a_email="{{ $arr->email }}" href="javascript:;"   class="btn-code ">免费获取校验码</a><a id="checkOldMobileForm:sendAuthCodeBtn7" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','checkOldMobileForm:oldMobileNumber',0,{'onevent':sCode7()});return false" class="btn-code">免费获取校验码</a> </span> <span id="sendCodeGrey7" style="display:none;"> <a href="#" id="sendAuthCodeBtn7" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span>
              <div id="checkOldMobileFormauthCodeErrorDiv" class="alert-error120"></div>
              <div id="authCodeMsg" style="display:none;" class="yzmplace"> 验证码已发送到您手机<span id="mobileMsg"></span>，如果收不到短信，请 <a id="checkOldMobileForm:sendAuthCodeBtn3" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'checkOldMobileForm:sendAuthCodeBtn3 checkOldMobileForm:oldMobileNumber',oncomplete:function(xhr,status,args){s7Code(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg2" style="display:none;" class="yzmplace"> 您的手机<span id="mobileMsg2"></span>将在60秒内收到语音电话，请接听！ </div>
            </li>
            <li><span class="txt-right" style="display:none;"><i class="error-icon"></i><i class="error-tip" id="ccoodd">验证码错误请重新输入</i></span>
              <br>
              <input type="button" id="butt"  name="checkOldMobileForm:j_idt129" value="确 认" class="btn-ok txt-right" onclick="return checkCheckOldMobileAll()">
            </li>
          </ul>
          <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="6247899183375709698:8256389782682127070" autocomplete="off">
        </form>
      </div>

    </div>
    <script type="text/javascript">


                     $("#tel").click(function () {
                         var email = $(this).attr('a_email');

                         var _token = $("[name=_token]").val();
                         $.post('email_code',{email:email,_token:_token},function (msg) {
                             if(msg==1){
                                 $("#tel").html('验证码已发送至邮箱');
                             }else{
                                 $("#tel").html('网络异常');
                             }


                         })
                     })

//手机号更改验证邮箱
                     $(document).on('click','#butt',function () {
                         var code = $(".a_code").val();
                         var obj = $(this);
                         var _token = $("[name=_token]").val();
                         $.post('code_verify',{code:code,_token:_token},function (msg) {
                             if(msg==1){
                                 $("[name=new_tel]").remove();
                                 var str = '<input type=text" id="new_tel" name="new_tel" placeholder="请输入新的电话号码" style="margin-left: 135px">';
                                 obj.before(str);

                                 obj.attr('id','new_but');
                             }else{

                                 $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
                                 var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>验证码错误，请重新输入...</span>");
                                 $("#checkOldMobileFormauthCodeErrorDiv").append($span);
                             }

                         })
                     })



//修改电话
                     $(document).on('click','#new_but',function () {
                         var new_tel = $("#new_tel").val();
                         var _token = $("[name=_token]").val();
                         var obj = $(this);
                         $.post('up_tel',{new_tel:new_tel,_token:_token},function (msg) {
                             if(msg==1){
                                 var span = '<span style="margin-left: 135px"><font color="green">修改成功√</font></span>';

                                 obj.before(span);

																 window.location.reload();
                             }else{
                                 var span = '<span style="margin-left: 135px"><font color="red">网络异常</font></span>';
                                 obj.before(span);
                             }


                         })
                     })









			//<![CDATA[
			           //验证手机号是否为空
			           function checkUpdateMobileFormMoible()
			           {
			        	   var mobile=$("#updateMonbileForm\\:mobileNumber2").val();
			        	   var nullFlag=(mobile=="");
			        	   if(nullFlag)
				   			{
				   				$("#updateMonbileForm\\:mobileNumber2_message").remove();
				   				var $span = $("<span id=updateMonbileForm\:mobileNumber2_message class=error>请输入手机号</span>");
				   				$("#mobileNumber2ErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var mobile2="15055100139";
					        	if(mobile2==mobile){
				        	   		$("#updateMonbileForm\\:mobileNumber2_message").remove();
					   				var $span = $("<span id=updateMonbileForm\:mobileNumber2_message class=error>与原手机号相同，请重新输入</span>");
					   				$("#mobileNumber2ErrorDiv").append($span);
					   				$("#sendCode1").hide();
					   				$("#sendAuthCodeBtn2").css("background-color","#FF736C");
					   				$("#sendCodeGrey1").show();
					   				return false;
					        	}
					        	else
					        	{
					        		$("#sendCode1").show();
					        		$("#sendAuthCodeBtn2").css("background-color","#c0c0c0");
					   				$("#sendCodeGrey1").hide();
					        	}
				   				
				   				var mobileError=$("#mobileNumber2ErrorDiv").text();
				   				if(mobileError=='请输入手机号')
				   				{
				   					$("#updateMonbileForm\\:mobileNumber2_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证验证码是否为空
			           function checkUpdateMonbileFormAuthCode()
			           {
			        	   var mobile=$("#updateMonbileForm\\:updateMonbileFormauthCode").val();
			        	   var nullFlag=(mobile=="");
			        	   $("#updateMonbileFormauthCodeErrorDiv").html("");
			        	   if(nullFlag)
				   			{
				   				$("#updateMonbileForm\\:updateMonbileFormauthCode_message").remove();
				   				var $span = $("<span id=updateMonbileForm\:updateMonbileFormauthCode_message class=error>请输入验证码</span>");
				   				$("#updateMonbileFormauthCodeErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var authCodeError=$("#updateMonbileFormauthCodeErrorDiv").text();
				   				if(authCodeError=='请输入验证码')
				   				{
				   					$("#updateMonbileForm\\:updateMonbileFormauthCode_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证所有
			           function updateMobileAll()
			           {
			        	   checkUpdateMobileFormMoible();
			        	   checkUpdateMonbileFormAuthCode();
			        	   var mobileErrorFlag=$("#mobileNumber2ErrorDiv").text()=="";
			        	   var authCodeErrorFlag=$("#updateMonbileFormauthCodeErrorDiv").text()=="";
			        	   return mobileErrorFlag&&authCodeErrorFlag;
			           }
			//]]>
		</script>
    <div class="alert-450" id="alert-updateMobile" style="display:none;">
      <div class="alert-title">
        <h3>修改手机</h3>
        <span class="alert-close" onclick="displaySpan('alert-updateMobile')"></span></div>
      <div class="alert-main">
        <form id="updateMonbileForm" name="updateMonbileForm" method="post" action="/user/managemyInfo" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="updateMonbileForm" value="updateMonbileForm">
          <ul>
            <li>
              <label class="txt-name">新手机号</label>
              <input id="updateMonbileForm:mobileNumber2" type="text" name="updateMonbileForm:mobileNumber2" autocomplete="off" value="15055100139" class="txt240" maxlength="35" onblur="jsf.util.chain(this,event,'return checkUpdateMobileFormMoible()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入手机号">
              <div id="mobileNumber2ErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">验证码</label>
              <input id="updateMonbileForm:updateMonbileFormauthCode" type="text" name="updateMonbileForm:updateMonbileFormauthCode" class="txt110" maxlength="8" onblur="jsf.util.chain(this,event,'return checkUpdateMonbileFormAuthCode()','mojarra.ab(this,event,\'blur\',0,\'@this\')')" onfocus="clearValue(this)" placeholder="请输入验证码">
              <span id="sendCode1"><a id="updateMonbileForm:sendAuthCodeBtn" href="#" onclick="PrimeFaces.ab({source:this,event:'action',process:'updateMonbileForm:sendAuthCodeBtn updateMonbileForm:mobileNumber2',oncomplete:function(xhr,status,args){s2Code(xhr, status, args, 'dx');}}, arguments[1]);;return false" class="btn-code">免费获取校验码</a><a id="updateMonbileForm:sendAuthCodeBtn5" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','updateMonbileForm:mobileNumber2',0,{'onevent':sCode4()});return false" class="btn-code">免费获取校验码</a> </span> <span id="sendCodeGrey1" style="display:none;"> <a href="#" id="sendAuthCodeBtn2" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span>
              <div id="updateMonbileFormauthCodeErrorDiv" class="alert-error120"></div>
              <div id="authCodeMsg3" style="display:none;" class="yzmplace"> 验证码已发送到您手机<span id="mobileMsg3"></span>，如果收不到短信，请 <a id="updateMonbileForm:sendAuthCodeBtn9" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'updateMonbileForm:sendAuthCodeBtn9 updateMonbileForm:mobileNumber2',oncomplete:function(xhr,status,args){s2Code(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg4" style="display:none;" class="yzmplace"> 您的手机<span id="mobileMsg4"></span>将在60秒内收到语音电话，请接听！ </div>
            </li>
            <li><span class="txt-right" style="display:none;"><i class="error-icon"></i><i class="error-tip">验证码错误请重新输入</i></span>
              <input type="submit" name="updateMonbileForm:j_idt139" value="确 认" class="btn-ok txt-right" onclick="return updateMobileAll()">
            </li>
          </ul>
          <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="6247899183375709698:8256389782682127070" autocomplete="off">
        </form>
      </div>
    </div>
    <script type="text/javascript">
			//<![CDATA[
			           //验证手机号是否为空
			           function checkchangeEmailFormNewEmail()
			           {
			        	   var email=$("#changeEmailForm\\:newEmail").val();
			        	   var nullFlag=(email=="");
			        	   if(nullFlag)
				   			{
				   				$("#changeEmailForm\\:newEmail_message").remove();
				   				var $span = $("<span id=changeEmailForm\:newEmail_message class=error>请输入新邮箱</span>");
				   				$("#newEmailErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{

                                var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                                var emailError=$("#newEmailErrorDiv").text();
				   				if(emailError=='请输入新邮箱')
				   				{
				   					$("#changeEmailForm\\:newEmail_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证验证码是否为空
			           function checkchangeEmailFormAuthCode()
			           {
			        	   var mobile=$("#changeEmailForm\\:changeEmailFormauthCode").val();
			        	   var nullFlag=(mobile=="");
			        	   if(nullFlag)
				   			{
				   				$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
				   				var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=error>请输入验证码</span>");
				   				$("#changeEmailFormauthCodeErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var mobileError=$("#changeEmailFormauthCodeErrorDiv").text();
				   				if(mobileError=='请输入验证码')
				   				{
				   					$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证所有
			           function changeEmailFormAll()
			           {
			        	   checkchangeEmailFormNewEmail();
			        	   checkchangeEmailFormAuthCode();
			        	   var emailErrorFlag=$("#newEmailErrorDiv").text()=="";
			        	   var authCodeErrorFlag=$("#changeEmailFormauthCodeErrorDiv").text()=="";
			        	   return emailErrorFlag&&authCodeErrorFlag;
			           }
			           $(document).ready(function(){
			   			var valiChangeEamilError = $("#valiChangeEamilError").val();
			   			if(valiChangeEamilError.length > 0){
			   				$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
			   	   			var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=error>"+valiChangeEamilError+"</span>");
			   	   			$("#changeEmailFormauthCodeErrorDiv").append($span);
			   			}
			   		});
			   	 //]]>
			   </script>



    <div class="alert-450" id="alert-updatezhifu" style="display:none;">
      <div class="alert-title">
        <h3>
@if($arr->is_lock==1)
		解锁
@else
        修改
@endif
        支付密码</h3>
        <span class="alert-close" onclick="displaySpan('alert-updatezhifu')"></span></div>
      <div class="alert-main" id="alert-main">
        <form id="changeEmailForm" name="changeEmailForm" method="post" action="/user/managemyInfo" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="changeEmailForm" value="changeEmailForm">
          <ul>
            <li>
              <label class="txt-name">请输入新支付密码</label>
              <input type="hidden" value="15055100139" id="mobile">
              <input id="changeEmailForm:newEmail" type="text" name="changeEmailForm:newEmail" class="txt235 new_pay" onblur="jsf.util.chain(this,event,'return checkchangeEmailFormNewEmail()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入新密码">
              <div id="newEmailErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">邮箱验证码</label>
              <input id="changeEmailForm:changeEmailFormauthCode" type="text" name="changeEmailForm:changeEmailFormauthCode" class="txt110 pay_code" maxlength="8" onblur="mojarra.ab(this,event,'blur',0,0)" placeholder="请输入邮箱验证码">
              <span id="sendCode2"><a id="changeEmailForm:sendAuthCodeBtn" href="javascript:;"  class="btn-code pay_em" email="{{ $arr->email }}" onclick="return pay_email()" >免费获取校验码</a><a id="changeEmailForm:sendAuthCodeBtn6" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','@this changeEmailForm:newEmail',0,{'onevent':sCode3});return false" class="btn-code ">免费获取校验码</a> </span> <span id="sendCodeGrey2" style="display:none;"> <a href="#" id="sendAuthCodeBtn3" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span> </li>
            <li>
              <div id="changeEmailFormauthCodeErrorDiv" class="errorplace"></div>
              <div id="authCodeMsg5" style="display:none;" class="yzmplace1"> 验证码已发送到您手机<span id="mobileMsg5"></span>，如果收不到短信，请 <a id="changeEmailForm:sendAuthCodeBtn4" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'changeEmailForm:sendAuthCodeBtn4 changeEmailForm:newEmail',oncomplete:function(xhr,status,args){s3Code(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg6" style="display:none;" class="yzmplace1"> 您的手机<span id="mobileMsg6"></span>将在60秒内收到语音电话，请接听！ </div>
              <input type="button" id="pay_bu"  value="确　认" class="pay btn-ok txt-right" onclick="return up_pay()">
            </li>
          </ul>
          <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="6247899183375709698:8256389782682127070" autocomplete="off">
        </form>
      </div>
      <div class="alert-main" id="alert-main2" style="display:none;text-align:center;">
        <div class="about-con">
          <ul>
            <li> <br>
              <span style="margin-left:80px;">请您先完成手机绑定，再进行邮箱更改！</span> </li>
            <li>
              <input type="submit" name="j_idt153" value="确认" style="margin:20px 0 20px 80px;" class="btn-ok txt-right2" onclick="displaySpan2()">
            </li>
          </ul>
        </div>
      </div>
    </div>








    <script>
//邮箱发送
          function pay_email() {
              var email = $(".pay_em").attr('email');
              var _token = $("[name=_token]").val();
              $.post('email_code',{email:email,_token:_token},function (msg) {
                  if(msg==1){
                      $(".pay_em").html('验证码已发送至邮箱');
                  }else{
                      $(".pay_em").html('网络异常');
                  }
              })
          }


//支付密码修改
      function up_pay(){
          var new_pay = $(".new_pay").val();
          var _token = $("[name=_token]").val();
          var code = $(".pay_code").val();

          $("#ss").remove();
          reg=/^\d{6}$/;
          if(!reg.test(new_pay)){
  
              var span = '<span id="ss" style="margin-left: 135px"><font color="red">请输入6位支付密码</font></span>';
              $("#pay_bu").before(span);
          }else{

              $.post('up_Pay_pwd',{new_pay:new_pay,_token:_token,code:code},function (msg) {
              	var lock_ti = '<span id="ss" style="margin-left: 135px"><font color="red">验证码错误</font></span>'
                  if(msg==1){
                      var span = '<span id="ss" style="margin-left: 135px"><font color="green">修改成功√</font></span>';
                      $("#pay_bu").before(span);
											window.location.reload()
                  }else if(msg==0){
                      var span = '<span id="ss" style="margin-left: 135px"><font color="red">网络异常</font></span>';
                      $("#pay_pu").before(lock_ti);
                      $("#pay_bu").before(span);
                  }else if(msg==2){
                  	$("#pay_pu").before(lock_ti);
                      var span = '<span id="ss" style="margin-left: 135px"><font color="red">验证码错误</font></span>';
                      $("#pay_bu").before(span);
                  }else if(msg==3){
                      var span = '<span id="ss" style="margin-left: 135px"><font color="green">解锁成功</font></span>';
                      $("#pay_pu").before(span);
                  }
              })
          }



      }


    </script>






    <input id="valiChangeEamilError" type="hidden" name="valiChangeEamilError">
    <div class="alert-450" id="alert-updateEmail" style="display:none;">
      <div class="alert-title">
        <h3>修改邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-updateEmail')"></span></div>
      <div class="alert-main" id="alert-main">
        <form id="changeEmailForm" name="changeEmailForm" method="post" action="/user/managemyInfo" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="changeEmailForm" value="changeEmailForm">
          <ul>
            <li>
              <label class="txt-name">请输入新邮箱</label>
              <input type="hidden" value="15055100139" id="mobile">
              <input id="changeEmailForm:newEmail" type="text" name="changeEmailForm:newEmail" class="txt235 new_email" onblur="jsf.util.chain(this,event,'return checkchangeEmailFormNewEmail()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入邮箱">
              <div id="newEmailErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">原邮箱验证码</label>
              <input id="changeEmailForm:changeEmailFormauthCode" type="text" name="changeEmailForm:changeEmailFormauthCode" class="txt110 old_email_code" maxlength="8" onblur="mojarra.ab(this,event,'blur',0,0)" placeholder="请输入邮箱验证码">
              <span id="sendCode2"><a id="changeEmailForm:sendAuthCodeBtn" href="javascript:;" onclick="jsf.util.chain(this,event,'return validateMailSMS(\'15055100139\');','PrimeFaces.ab({source:this,event:\'action\',process:\'changeEmailForm:sendAuthCodeBtn changeEmailForm:newEmail\',oncomplete:function(xhr,status,args){s3Code(xhr, status, args, \'dx\');}}, arguments[1]);');return false" class="btn-code emm" email="{{ $arr->email }}">免费获取校验码</a><a id="changeEmailForm:sendAuthCodeBtn6" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','@this changeEmailForm:newEmail',0,{'onevent':sCode3});return false" class="btn-code">免费获取校验码</a> </span> <span id="sendCodeGrey2" style="display:none;"> <a href="#" id="sendAuthCodeBtn3" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span> </li>
            <li>
              <div id="changeEmailFormauthCodeErrorDiv" class="errorplace"></div>
              <div id="authCodeMsg5" style="display:none;" class="yzmplace1"> 验证码已发送到您手机<span id="mobileMsg5"></span>，如果收不到短信，请 <a id="changeEmailForm:sendAuthCodeBtn4" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'changeEmailForm:sendAuthCodeBtn4 changeEmailForm:newEmail',oncomplete:function(xhr,status,args){s3Code(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg6" style="display:none;" class="yzmplace1"> 您的手机<span id="mobileMsg6"></span>将在60秒内收到语音电话，请接听！ </div>
              <input type="button" id="em_but" name="changeEmailForm:j_idt150" value="确　认" class="btn-ok txt-right" onclick="return changeEmailFormAll()">
            </li>
          </ul>
          <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="6247899183375709698:8256389782682127070" autocomplete="off">
        </form>
      </div>
      <div class="alert-main" id="alert-main2" style="display:none;text-align:center;">
        <div class="about-con">
          <ul>
            <li> <br>
              <span style="margin-left:80px;">请您先完成手机绑定，再进行邮箱更改！</span> </li>
            <li>
              <input type="submit" name="j_idt153" value="确认" style="margin:20px 0 20px 80px;" class="btn-ok txt-right2" onclick="displaySpan2()">
            </li>
          </ul>
        </div>
      </div>
    </div>
    <script type="text/javascript">



      //发送邮箱
      $(".emm").click(function () {
          var email = $(this).attr('email');
          var _token = $("[name=_token]").val();
          $.post('email_code',{email:email,_token:_token},function (msg) {
              if(msg==1){
                  $(".emm").html('验证码已发送至邮箱');
              }else{
                  $(".emm").html('网络异常');
              }


          })
      })





          $("#em_but").click(function () {
             var _token = $("[name=_token]").val();
             var new_email = $(".new_email").val();
             var old_email_code = $(".old_email_code").val();
             var obj = $(this);
             if(new_email=="" || old_email_code==""){

             }else{
                 var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
                 if(reg.test(new_email)){
                     $.post('up_email',{_token:_token,new_email:new_email,old_email_code:old_email_code},function (msg) {
                         $("#s").remove();
                         if(msg==1){
                             var span = '<span id="s" style="margin-left: 135px"><font color="green">修改成功√</font></span>';
                             obj.before(span);
														 window.location.reload()
                         }else if(msg==0){
                             var span = '<span id="s" style="margin-left: 135px"><font color="red">网络异常</font></span>';
                             obj.before(span);
                         }else{
                             var span = '<span id="s" style="margin-left: 135px"><font color="red">验证码错误</font></span>';
                             obj.before(span);
                         }
                     })
                 }else{
                     $("#lii").remove()
                     $(".new_email").after('<li id="lii"><span id="spp" style="padding-left: 130px"><font color="red">邮箱格式不正确</font></span></li>')
                 }

             }





          })


			//<![CDATA[
			           //验证邮箱是否为空
			           function checkbandingEmailFormEmail()
			           {
			        	   var mobile=$("#bandingEmail\\:bandingEmailemail").val();
			        	   var nullFlag=(mobile=="");
			        	   if(nullFlag)
				   			{
				   				$("#bandingEmail\\:bandingEmailemail_message").remove();
				   				var $span = $("<span id=bandingEmail\:bandingEmailemail_message class=error>请先输入邮箱</span>");
				   				$("#bandingEmailemailErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var error=$("#bandingEmailemailErrorDiv").text();
				   				if(error=='请先输入邮箱')
				   				{
				   					$("#bandingEmail\\:bandingEmailemail_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证所有
			           function bandingEmailAll()
			           {
			        	   checkbandingEmailFormEmail();
			        	   var emailErrorFlag=$("#bandingEmailemailErrorDiv").text()=="";
			        	   return emailErrorFlag;
			           }
			//]]>
		</script>
    <div class="alert-450" id="alert-bandingEmail" style="display:none;">
      <div class="alert-title">
        <h3>绑定邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-bandingEmail')"></span></div>
      <div class="alert-main">
        <form id="bandingEmail" name="bandingEmail" method="post" action="" enctype="application/x-www-form-urlencoded">
          <ul>
            <li>
              <label class="txt-name">绑定邮箱</label>
              <input id="bandingEmail:bandingEmailemail" type="text" name="bandingEmail:bandingEmailemail" value="348705622@qq.com" class="txt235" onblur="jsf.util.chain(this,event,'return checkbandingEmailFormEmail()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入邮箱">
              <div id="bandingEmailemailErrorDiv" class="alert-error120"></div>
            </li>
            <input type="submit" name="bandingEmail:j_idt158" value="确认并激活邮箱" class="btn-ok txt-right" onclick="return bandingEmailAll()">
          </ul>
        </form>
      </div>
    </div>
    <script type="text/javascript">
			//<![CDATA[
			           //验证邮箱是否为空
			           function checkactiveEmailFormEmail()
			           {
			        	   var email=$("#activeEmail\\:activeEmailemail").val();
			        	   var nullFlag=(email=="");
			        	   if(nullFlag)
				   			{
				   				$("#activeEmail\\:activeEmailemail_message").remove();
				   				var $span = $("<span id=activeEmail\:activeEmailemail_message class=error>请输入邮箱</span>");
				   				$("#activeEmailemailErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var error=$("#activeEmailemailErrorDiv").text();
				   				if(error=='请输入邮箱')
				   				$("#activeEmail\\:activeEmailemail_message").remove();
				   			}
			        	   return true;
			           }
			           //验证所有
			           function checkActiveEmailAll()
			           {
			        	   var emailErrorFlag=$("#activeEmailemailErrorDiv").text()=="";
			        	   return emailErrorFlag;
			           }
			//]]>
		</script>
    <div class="alert-450" id="alert-activeEmail" style="display:none;">
      <div class="alert-title">
        <h3>激活邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-activeEmail')"></span></div>
      <div class="alert-main">
        <form id="activeEmail" name="activeEmail" method="post" action="" enctype="application/x-www-form-urlencoded">
          <ul>
            <li>
              <label class="txt-name">邮箱</label>
              <input id="activeEmail:activeEmailemail" type="text" name="activeEmail:activeEmailemail" value="348705622@qq.com" class="txt235" onblur="jsf.util.chain(this,event,'return checkactiveEmailFormEmail()','mojarra.ab(this,event,\'blur\',0,0)')">
              <div id="activeEmailemailErrorDiv" class="alert-error120"></div>
            </li>
            <input type="submit" name="activeEmail:j_idt163" value="立即激活邮箱" class="btn-ok txt-right" onclick="return checkActiveEmailAll()">
          </ul>
        </form>
      </div>
    </div>
    <div class="alert-450 alert-h220" id="alert-activeEmailMsg" style="display:none;">
      <div class="alert-title">
        <h3>激活邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-activeEmailMsg')"></span></div>
      <div class="alert-main">
        <form id="activeEmailMsg" name="activeEmailMsg" method="post" action="" enctype="application/x-www-form-urlencoded" target="_blank">
          <input type="hidden" name="activeEmailMsg" value="activeEmailMsg">
          <p class="msg5" style="margin-top:0;">我们已经向您的注册邮箱发送了一封验证邮件<br>
            验证邮件有效期为<i class="c-red">24小时</i>，请及时查收。</p>
          <p class="msg-a">
            <input type="submit" name="activeEmailMsg:j_idt167" value="立即验证" class="btn-ok btn-145">
          </p>
        </form>
      </div>
    </div>
    <script type="text/javascript">
			//<![CDATA[
			           //验证原密码
			           function checkupdatePassFormOldPassword()
			           {
			        	   var oldPassword=$("#updatePassForm\\:oldPassword").val();
			        	   var nullFlag=(oldPassword=="");
			        	   if(nullFlag)
				   			{
				   				$("#updatePassForm\\:oldPassword_message").remove();
				   				var $span = $("<span id=updatePassForm\:oldPassword_message class=error>请输入密码</span>");
				   				$("#oldPasswordErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var oldPasswordError=$("#oldPasswordErrorDiv").text();
				   				if(oldPasswordError=='请输入密码')
				   				{
				   					$("#updatePassForm\\:oldPassword_message").remove();
				   				}
				   			}
			        	   return true;
			           }
			           //验证输入密码框
			           function checkPassword()
			           {
			        	   var password=$("#updatePassForm\\:password").val();
			        	   var nullFlag=(password=="");
			        	   if(nullFlag)
				   			{
				   				$("#updatePassForm\\:password_message").remove();
				   				var $span = $("<span id=updatePassForm\:password_message class=error>请输入新密码</span>");
				   				$("#passwordErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var oldpassword=$("#updatePassForm\\:oldPassword").val();
				   				var errorMessage=$("#oldPasswordErrorDiv").text();
				   				
				   				var nullOldFlag=(oldpassword=="");
				   				var errorFlag=(errorMessage=="");
				   				 if(!nullOldFlag&&errorFlag&&(oldpassword==password))
				   				{
				   					$("#updatePassForm\\:password_message").remove();
					   				var $span = $("<span id=updatePassForm\:password_message class=error>输入密码不能与原密码相同</span>");
					   				$("#passwordErrorDiv").append($span);
					   				return false;
				   				}
				   				var nullerror=$("#passwordErrorDiv").text();
				   				if(nullerror=="请输入密码")
				   				{
				   					$("#updatePassForm\\:password_message").remove();
				   				} 
				   			}
			        	   return true;
			           }
			           //验证重输密码框
			           function checkRepassword()
			   		   {
				   			var password=$("#updatePassForm\\:password").val();
				   			var repassword=$("#updatePassForm\\:repassword").val();
				   			var flag=(password==repassword);
				   			var nullFlag=(repassword=="");
				   			if(nullFlag)
				   			{
				   				$("#repassword_message").remove();
				   				var $span = $("<span id=repassword_message class=error>请输入确认密码</span>");
				   				$("#repasswordErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				$("#repassword_message").remove();
				   			}
				   			if(flag==false)
				   			{
				   				$("#repassword_message").remove();
				   				var $span = $("<span id=repassword_message class=error>两次密码不同</span>");
				   				$("#repasswordErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				$("#repassword_message").remove();
				   			}
				   			return true;
			   		   }
			           function checkupdatePassFormAll()
			           {
			        	   checkupdatePassFormOldPassword();
			        	   checkPassword();
			        	   checkRepassword();
			        	   var oldPasswordFlag=$("#oldPasswordErrorDiv").text()=="";
			        	   var passwordFlag=$("#passwordErrorDiv").text()=="";
			        	   var repasswordFlag=$("#repasswordErrorDiv").text()=="";
			        	   return oldPasswordFlag&&passwordFlag&&repasswordFlag;
			           }
			//]]>
		</script>














    <div class="alert-450" id="alert-updatePass" style="display: none;">
      <div class="alert-title">
        <h3>修改密码</h3>
        <span class="alert-close" onclick="displaySpan('alert-updatePass')"></span></div>
      <div class="alert-main">
        <form id="updatePassForm" name="updatePassForm" method="post" action="" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="updatePassForm" value="updatePassForm">
          <ul>
            <li>
              <label class="txt-name">请输入原密码</label>
              <input id="updatePassForm:oldPassword" type="password" name="updatePassForm:oldPassword" value="" maxlength="20" onblur="jsf.util.chain(this,event,'return checkupdatePassFormOldPassword()','mojarra.ab(this,event,\'blur\',0,0)')" class="txt235 old_pwd">
              <div id="oldPasswordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">请输入新密码</label>
              <input id="updatePassForm:password" type="password" name="updatePassForm:password" value="" maxlength="20" onblur="jsf.util.chain(this,event,'return checkPassword()','mojarra.ab(this,event,\'blur\',0,0)')" class="txt235 new_pwd">
              <div id="passwordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">请确认新密码</label>
              <input id="updatePassForm:repassword" type="password" name="updatePassForm:repassword" value="" maxlength="20" onblur="return checkRepassword()" class="txt235 qr_pwd">
              <div id="repasswordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <input type="button" name="updatePassForm:j_idt174" value="确 认" class="pw_but btn-ok btn-235 txt-right" onclick="return checkupdatePassFormAll()">
            </li>
          </ul>
        </form>
      </div>
      <script type="text/javascript">

                $(".pw_but").click(function () {
                    var old_pwd = $(".old_pwd").val();
                    var new_pwd = $(".new_pwd").val();
                    var qr_pwd = $(".qr_pwd").val();
                    var _token = $("[name=_token]").val();
                    var obj = $(this);
                    $("#pw_ts").remove();
                    if(old_pwd==""&&new_pwd==""&&qr_pwd==""){

                    }else{
                        $.post('Up_pwd',{old_pwd:old_pwd,new_pwd:new_pwd,qr_pwd:qr_pwd,_token:_token},function (msg) {
                            //0修改失败   1修改成功  2原密码不正确 3新密码输入不一致
                            if(msg==0){
                                var span = '<span id="pw_ts" style="margin-left: 135px"><font color="red">修改失败</font></span>';
                                obj.before(span);
                            }else if(msg==1){
                                var span = '<span id="pw_ts" style="margin-left: 135px"><font color="green">修改成功√</font></span>';
                                obj.before(span);
																window.location.reload()
                            }else if(msg==2){
                                var span = '<span id="pw_ts" style="margin-left: 135px"><font color="red">原密码不正确</font></span>';
                                obj.before(span);
                            }else if(msg==3){
                                var span = '<span id="pw_ts" style="margin-left: 135px"><font color="red">新密码输入不一致</font></span>';
                                obj.before(span);
                            }

                        })
                    }


                })

				//<![CDATA[
		    	if(window.ActiveXObject)
			    {
			        var browser=navigator.appName;
			        var b_version=navigator.appVersion;
			        var version=b_version.split(";"); 
			        var trim_Version=version[1].replace(/[ ]/g,""); 

			        if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0") 
			        { 
			        	$("#checkMonbileForm\\:sendAuthCodeBtn4").css("display","block");
			        	$("#checkMonbileForm\\:sendAuthCodeBtn").css("display","none");
			        	$("#updateMonbileForm\\:sendAuthCodeBtn5").css("display","block");
			        	$("#updateMonbileForm\\:sendAuthCodeBtn").css("display","none");
			        	$("#changeEmailForm\\:sendAuthCodeBtn6").css("display","block");
			        	$("#changeEmailForm\\:sendAuthCodeBtn").css("display","none");
			        	$("#checkOldMobileForm\\:sendAuthCodeBtn7").css("display","block");
			        	$("#checkOldMobileForm\\:sendAuthCodeBtn").css("display","none");
			        } 
		        }
		        function sCode2(){
		        	var mobile = $("#checkMonbileForm\\:mobileNumber").val();
		        	var mobileRegex="^1[3|4|5|7|8][0-9]{9}$";
		        	var mobilePattern = new RegExp(mobileRegex);
    				var mobileFlag=mobilePattern.test(mobile);
    				
    				if(!mobileFlag){
    					return;
    				} 
		        	$("#sendCode").hide();
					$("#sendCodeGrey").show();
					if(flag && $("#sendCode").is(":hidden")){
						return;
					}
					flag = true;
					timer("sendAuthCodeBtn1", {
						"count" : 60,
						"animate" : true,
						initTextBefore : "后可重新操作",
						initTextAfter : "秒",
						callback:function(){
							$("#sendCode").show();
							$("#sendCodeGrey").hide();
							flag = false;
						}
					}).begin();
		        }
		        function sCode3(){
		        	var email = $("#changeEmailForm\\:newEmail").val();
		        	if(email=="") {
		        		return;
		        	}
		    		var emailRegex="^([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$";
		        	var emailPattern = new RegExp(emailRegex);
    				var emailFlag=emailPattern.test(email);
    				if(!emailFlag){
    					return;
    				}
    				
		        	$("#sendCode2").hide();
					$("#sendCodeGrey2").show();
					if(flag && $("#sendCode2").is(":hidden")){
						return;
					}
					flag = true;
					timer("sendAuthCodeBtn3", {
						"count" : 60,
						"animate" : true,
						initTextBefore : "后可重新操作",
						initTextAfter : "秒",
						callback:function(){
							$("#sendCode2").show();
							$("#sendCodeGrey2").hide();
							flag = false;
						}
					}).begin();
		        }
		        function sCode4(){
		        	var mobile = $("#updateMonbileForm\\:mobileNumber2").val();
		        	var mobileRegex="^1[3|4|5|7|8][0-9]{9}$";
		        	var mobilePattern = new RegExp(mobileRegex);
    				var mobileFlag=mobilePattern.test(mobile);
    				
    				if(!mobileFlag){
    					return;
    				} 
		        	$("#sendCode1").hide();
					$("#sendCodeGrey1").show();
					if(flag && $("#sendCode1").is(":hidden")){
						return;
					}
					flag = true;
					timer("sendAuthCodeBtn2", {
						"count" : 60,
						"animate" : true,
						initTextBefore : "后可重新操作",
						initTextAfter : "秒",
						callback:function(){
							$("#sendCode1").show();
							$("#sendCodeGrey1").hide();
							flag = false;
						}
					}).begin();
		        }
		        function sCode7()
		        {
		        	$("#sendCode7").hide();
					$("#sendCodeGrey7").show();
					if(flag && $("#sendCode7").is(":hidden")){
						return;
					}
					flag = true;
					timer("sendAuthCodeBtn7", {
						"count" : 60,
						"animate" : true,
						initTextBefore : "后可重新操作",
						initTextAfter : "秒",
						callback:function(){
							$("#sendCode7").show();
							$("#sendCodeGrey7").hide();
							flag = false;
						}
					}).begin();
		        }
		        var ua = navigator.userAgent; 
				if(ua.indexOf("Windows NT 5")!=-1) { 
				    if(window.ActiveXObject)
				    {
				        var browser=navigator.appName 
				        var b_version=navigator.appVersion 
				        var version=b_version.split(";"); 
				        var trim_Version=version[1].replace(/[ ]/g,""); 
				        if(browser=="Microsoft Internet Explorer" && (trim_Version=="MSIE8.0" || trim_Version=="MSIE7.0")) 
				        { 
				        	$("#checkMonbileForm\\:sendAuthCodeBtn4").css("display","block");
				        	$("#checkMonbileForm\\:sendAuthCodeBtn").css("display","none");
				        	$("#updateMonbileForm\\:sendAuthCodeBtn5").css("display","block");
				        	$("#updateMonbileForm\\:sendAuthCodeBtn").css("display","none");
				        	$("#changeEmailForm\\:sendAuthCodeBtn6").css("display","block");
				        	$("#changeEmailForm\\:sendAuthCodeBtn").css("display","none");
				        	$("#checkOldMobileForm\\:sendAuthCodeBtn7").css("display","block");
				        	$("#checkOldMobileForm\\:sendAuthCodeBtn").css("display","none");
				        } 
			        }
				}

				
				var second = 0;
                var internal;
                /** 校验修改手机验证码 */
				function validateModifyPhoneSMS(mobileNumber){
					$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
					if(mobileNumber == '请输入手机号'){
		                return;
					}
					var returnResult = false;
					$.ajax({
						   url: "/valiSms",
						   async:false,
						   data:{
								mobileNumber:mobileNumber
						   },
						   success: function(data){
							   if(data.flag == 'NO'){
								   $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
								   var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
						   		   $("#checkOldMobileFormauthCodeErrorDiv").append($span);
								   second = data.second;
								   clearInterval(internal);
								   internal = setInterval(function(){
		                              if(second == 0){
		                            	  $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
		                              }else{
		                            	  second = second -1;
		                            	  $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").find('b').html(second);
		                              }
								   },1000);
								   returnResult = false;
							   }else if(data.flag == 'NO1'){
								   $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
								   var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=alerterror>"+data.smsVali+"</span>");
						   		   $("#checkOldMobileFormauthCodeErrorDiv").append($span);
								   returnResult = false;
							   }else{
								   returnResult = true;
							   }
						   }
					    });
		               return returnResult;
				}

				 /** 校验修改邮箱验证码 */
				function validateMailSMS(mobileNumber){
					$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
					if(mobileNumber == '请输入手机号'){
		                return;
					}
					var returnResult = false;
					$.ajax({
						   url: "/valiSms",
						   async:false,
						   data:{
								mobileNumber:mobileNumber
						   },
						   success: function(data){
							   if(data.flag == 'NO'){
								   $("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
						   		   var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
				   				   $("#changeEmailFormauthCodeErrorDiv").append($span);
								   second = data.second;
								   clearInterval(internal);
								   internal = setInterval(function(){
		                              if(second == 0){
		                            	  $("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
		                              }else{
		                            	  second = second -1;
		                            	  $("#changeEmailForm\\:changeEmailFormauthCode_message").find('b').html(second);
		                              }
								   },1000);
								   returnResult = false;
							   }else if(data.flag == 'NO1'){
						   		   $("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
						   		   var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=alerterror>"+data.smsVali+"</span>");
				   				   $("#changeEmailFormauthCodeErrorDiv").append($span);
								   returnResult = false;
							   }else{
								   returnResult = true;
							   }
						   }
					    });
		               return returnResult;
				}

				/** 绑定手机 */
				function validateBindPhoneSMS(){
					
					$("#checkMonbileForm\\:authCode_message").remove();
					var mobileNumber = $("#checkMonbileForm\\:mobileNumber").val();
					if(mobileNumber == '请输入手机号'){
		                return;
					}
					var returnResult = false;
					$.ajax({
						   url: "/valiSms",
						   async:false,
						   data:{
								mobileNumber:mobileNumber
						   },
						   success: function(data){
							   if(data.flag == 'NO'){
								   $("#checkMonbileForm\\:authCode_message").remove();
				   				   var $span = $("<span id=checkMonbileForm\:authCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
				   				   $("#authCodeErrorDiv").append($span);
								   second = data.second;
								   clearInterval(internal);
								   internal = setInterval(function(){
		                              if(second == 0){
		                            	  $("#checkMonbileForm\\:authCode_message").remove();
		                              }else{
		                            	  second = second -1;
		                            	  $("#checkMonbileForm\\:authCode_message").find('b').html(second);
		                              }
								   },1000);
								   returnResult = false;
							   }else if(data.flag == 'NO1'){
				   				   $("#checkMonbileForm\\:authCode_message").remove();
				   				   var $span = $("<span id=checkMonbileForm\:authCode_message class=alerterror>"+data.smsVali+"</span>");
				   				   $("#authCodeErrorDiv").append($span);
								   returnResult = false;
							   }else{
								   returnResult = true;
							   }
						   }
					    });
		               return returnResult;
				}
				
		        //]]>
		    </script>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--网站底部-->
<div id="footer" class="ft">
  <div class="ft-inner clearfix">
    <div class="ft-helper clearfix">
      <dl>
        <dt>关于我们</dt>
        <dd><a href="公司简介.html">公司简介</a><a href="管理团队.html">管理团队</a><a href="网站公告.html">网站公告</a></dd>
      </dl>
      <dl>
        <dt>相关业务</dt>
        <dd><a href="list.html">我要投资</a><a href="我要借款.html">我要借款</a></dd>
      </dl>
      <dl>
        <dt>帮助中心</dt>
        <dd><a href="帮助中心.html">新手入门</a><a href="个人中心首页.html">我的账户</a><a href="list.html">债权转让</a></dd>
      </dl>
      <dl>
        <dt>联系我们</dt>
        <dd><a href="联系我们.html">联系我们</a></dd>
      </dl>
    </div>
    <div class="ft-service">
      <dl>
        <dd>
          <p><strong>400-660-1268</strong><br>
            工作日 9:00-22:00<br>
            官方交流群:<em>12345678</em><br>
            工作日 9:00-22:00 / 周六 9:00-18:00<br>
          </p>
          <div class="ft-serv-handle clearfix"><a class="icon-hdSprite icon-ft-sina a-move a-moveHover" title="亿人宝新浪微博" target="_blank" href="#"></a><a class="icon-hdSprite icon-ft-qqweibo a-move a-moveHover" title="亿人宝腾讯微博" target="_blank" href="#"></a><a class="icon-ft-qun a-move a-moveHover" title="亿人宝QQ群" target="_blank" href="#"></a><a class="icon-hdSprite icon-ft-email a-move a-moveHover mrn" title="阳光易贷email" target="_blank" href="mailto:xz@yirenbao.com"></a></div>
        </dd>
      </dl>
    </div>
    <div class="ft-wap clearfix">
      <dl>
        <dt>官方二维码</dt>
        <dd><span class="icon-ft-erweima"><img src="home/images/code.png" style="display: inline;"></span></dd>
      </dl>
    </div>
  </div>
  <div class="ft-record">
    <div class="ft-approve clearfix"><a class="icon-approve approve-0 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-1 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-2 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-3 fadeIn-2s" target="_blank" href="#"></a></div>
    <div class="ft-identity">©2015 亿人宝 All rights reserved&nbsp;&nbsp;&nbsp;<span class="color-e6">|</span>&nbsp;&nbsp;&nbsp;安徽省亿人宝投资管理有限公司&nbsp;&nbsp;&nbsp;<span class="color-e6">|</span>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://www.htmlsucai.com">皖ICP备12345678号-1</a></div>
  </div>
</div>
</body>
</html>
