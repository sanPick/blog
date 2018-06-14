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
<?php include('layouts/header.blade.php'); ?>
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1200" height="96"></a></div>
    <div id="personal-left" class="personal-left">
<?php include('layouts/user_ucenter.php'); ?>

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
        <h3><i>抵押物质押</i></h3>


          <div class="pay-form">
            <h6>请输入您的质押物信息</h6>
						<form method="post" action="user_pawn_add" enctype="multipart/form-data">
						 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						 <input type="hidden" name="type" value="<?php echo $type; ?>">
            <ul>
              <li>
                <label for="realname">质押物名称</label>
                <input type="text"  class="pay-txt"   name="goods_name" placeholder="质押物名称">
                <div id="realnameErrorDiv"></div>
              </li>
              <li>
                <label for="idCard">质押物证件</label>
                <input type="file"  class="input" style="height:30px;"  name="goods_img"  placeholder="质押物证件">
									&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;&nbsp;
                  <span style="margin-top:10px;">(质押物证件需要通过认证，请您上传真实证件)</span>

              </li>
              <li>
                <label for="idCard">预算价格</label>
                <input type="text"  class="pay-txt"  name="pre_money"  placeholder="预算价格">
                <div id="idCardErrorDiv">
                  <p style="margin-top:10px;">(用户预算价格，提交后将对商品进行评估出真实价格)</p>
                </div>
              </li>
            </ul>
						<li>
                <input type="submit" name="" value="提交" style="border:none;" class="btn-paykh">
              </li>
							</form>
            <h6>身份证已绑定</h6>
            <ul>
              <li>
                <label for="email">身份证姓名</label>
                <label id="form:email">{{substr_replace($card_name,'***',3)}}</label>
              </li>
              <li>
                <label for="email">身份证号</label>
                <label id="form:email">{{substr_replace($card_number,'*****',3,11)}}</label>
              </li>
            </ul>

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
			        	   checkactiveEmailFormEmail();
			        	   var emailErrorFlag=$("#activeEmailemailErrorDiv").text()=="";
			        	   return emailErrorFlag;
			           }
			//]]>
		</script>
        <div class="pay-tipcon">
如何质押？
借款人将经过简贷风控团队授信后的域名PUSH到简贷指定的平台账号：易名中国ID(167719)、爱名网ID（1060210）、万网账号（简贷金融）下，并通知客服确认。<br>
如何发布借款项目？
只有经过授信且域名质押后才可以提交申请借款，通过质押/域名管理的已质押域名列表申请发布借款项目。<br>
为什么发布不了借款项目？
您有严重逾期或者授信额度不够。<br>
逾期了怎么办？
如果借款人未在规定的时间偿还借款利息和管理费用，平台将加收罚金；如果借款人到期无法按时偿还本金和利息的，平台将先行垫付，并加收罚金；到期七天后，借款人仍未按照约定还款日期偿还本金、利息和管理费用和违约金，平台将对借款人的质押物进行依法处理用以清偿债务。如果逾期还款，简贷平台有权根据具体情况将用户列入不良信用客户，强烈呼吁借款人尽量避免逾期还款，一旦发生逾期请尽快还清贷款。<br>
可以提前还款吗？
可以提前还款，但是借款的利息和平台费用按正常还款收取 </div>
      </div>
      <script type="text/javascript">
				//<![CDATA[
		    	if(window.ActiveXObject)
			    {
			        var browser=navigator.appName 
			        var b_version=navigator.appVersion 
			        var version=b_version.split(";"); 
			        var trim_Version=version[1].replace(/[ ]/g,""); 
			        if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0") 
			        { 
			        	$("#form\\:sendAuthCodeBtn2").css("display","block");
			        	$("#form\\:sendAuthCodeBtn").css("display","none");
			        } 
		        }
		        function sCode2(){
		        	var mobile = $("#form\\:mobileNumber").val();
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
				        	$("#form\\:sendAuthCodeBtn2").css("display","block");
			        		$("#form\\:sendAuthCodeBtn").css("display","none");
				        } 
			        }
				}

				var second = 0;
                var internal;
                /** 校验修改手机验证码 */
				function validateSMS(){
					$("#form\\:authCode_message").remove();
					var mobileNumber = $("#form\\:mobileNumber").val();
					if(mobileNumber == '请输入手机'){
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
								   $("#form\\:authCode_message").remove();
						   		   var $span = $("<span id=form\:authCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
				   				   $("#authCodeErrorDiv").append($span);
								   second = data.second;
								   clearInterval(internal);
								   internal = setInterval(function(){
		                              if(second == 0){
		                            	  $("#form\\:authCode_message").remove();
		                              }else{
		                            	  second = second -1;
		                            	  $("#form\\:authCode_message").find('b').html(second);
		                              }
								   },1000);
								   returnResult = false;
							   }else if(data.flag == 'NO1'){
								   $("#form\\:authCode_message").remove();
						   		   var $span = $("<span id=form\:authCode_message class=alerterror>"+data.smsVali+"</span>");
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
<?php include('layouts/foot.php') ?>
<script src="script/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="script/datepicker.js" type="text/javascript"></script>
</body>
</html>
