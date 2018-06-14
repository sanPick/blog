<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
<link href="home/css/base.css" rel="stylesheet">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="text/javascript"></script>

<script src="home/js/jquery-1.js" type="text/javascript"></script>
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
    <label id="typeValue" style="display:none;"> </label>
    <script>

		</script>

    <div class="personal-main">
      <div class="personal-pay">
        <h3><i>贷款申请</i></h3>
        <div class="quick-pay-wrap">
          <h4> <span class="quick-tit pay-cur"><em>申请流程</em></span> </h4>
          
            <div class="quick-main">
              <div class="fl quick-info">
								
                <div class="info-1">
								<div class="credit-ad"><img src="home/images/liucheng.png" ></div>
                  <!--<input id="form:actualMoney1" type="text" name="" class="pay-money-txt" maxlength="10" >-->
                   </div>
                <div class="info-tips"></div>
                <div class="info-2"> <span class="info-tit"></span> <span class="info2-input">
                  <!--<input id="form:bankCardNo" type="text" name="form:bankCardNo" class="tx-txt">-->
                  <em class="info2-bank" style="display: none;">
                  <label id="form:defaultBankName" style="font-size:16px;"> </label>
                  </em> </span> <span class="quick-error3" id="bankCardError"></span> </div>
                <div class="bank-check" id="bank-check2"> <span class="bank-agree">   &nbsp;<a href="#" target="_blank"></a></span> <span class="error" id="bankProtocol_message" style="display:none;margin-top:-3px;"></span> </div>
								<br>
								<br>
                <input type="button" name="" value="立 即 申 请" opt="1" class="btn-paycz"  >
              </div>



              <div class="fr bank-info">
                <p class="bank-tit"></p>
                <div class="bank-pic"></div>
              </div>



          <div class="pay-tipcon" style="display:none;"> 
        </div>
      </div>
     <div class="quick-main">
              <div class="fl quick-info">
								
                <div class="info-1">
								<div class="credit-ad"><img src="home/images/liucheng1.png" ></div>
                  <!--<input id="form:actualMoney1" type="text" name="" class="pay-money-txt" maxlength="10" >-->
                   </div>
                <div class="info-tips"></div>
                <div class="info-2"> <span class="info-tit"></span> <span class="info2-input">
                  <!--<input id="form:bankCardNo" type="text" name="form:bankCardNo" class="tx-txt">-->
                  <em class="info2-bank" style="display: none;">
                  <label id="form:defaultBankName" style="font-size:16px;"> </label>
                  </em> </span> <span class="quick-error3" id="bankCardError"></span> </div>
                <div class="bank-check" id="bank-check2"> <span class="bank-agree">   &nbsp;<a href="#" target="_blank"></a></span> <span class="error" id="bankProtocol_message" style="display:none;margin-top:-3px;"></span> </div>
								<br>
								<br>
                <input type="button" name="" value="立 即 申 请" opt="2" class="btn-paycz" >
              </div>
            </div>
 </div>
 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <script type="text/javascript">
				$(document).on('click','.btn-paycz',function(){
						var type = $(this).attr('opt')
						var _token = $('input[name=_token]').val()
						$.ajax({
							type:'post',
							data:{type:type,_token:_token},
							url:'user_pawn',
							success:function(msg){
								$('body').html(msg)
							}
						})
				})
			</script>
      <div class="alert-450" id="alert-tyht" style="display:none;">
        <div class="alert-title">
          <h3>提示信息</h3>
          <span class="alert-close" onclick="displaySpan('alert-tyht')"></span></div>
        <div class="alert-main" style="margin-bottom: 35px;margin-left: 25px;">

        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--网站底部-->
<?php include('layouts/foot.php') ?>
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
</body>
</html>
<script>
@if($user_info==0)
      art.dialog({
				title: '请先完善您的信息',
				content: '',
				resize:true,//可拉伸弹出框开关
				fixed:true,
				lock:true,//锁屏
				opacity:.7,//锁屏背景透明度
				background:'#000',//锁屏背景颜色
				drag:false,//拖动开关
				width:350,
				height:50,
				okVal: "去完善",
				ok: function(){
					window.location.href= "evip";
				}
			});
			location.href='evip'
@endif
</script>
