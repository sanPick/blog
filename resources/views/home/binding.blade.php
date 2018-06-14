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
<!--头部-->
<?php include('layouts/header.blade.php') ?>
<!--头部end-->
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="home/images/clist1.jpg" width="1200" height="96"></div>
    <div id="personal-left" class="personal-left">
    <!--用户中心菜单-->
    <?php include('layouts/user_ucenter.php') ?>
    <!--用户中心菜单end-->
    </div>


    <div class="personal-main">
      <div class="personal-pay">
        <h3><i>开通第三方账户</i></h3>
        <form action="binding" method="post" id="form"  class="form-x" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          <div class="pay-notice">
            <p>开通第三方资金托管账户的信息将提交至<a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>网站执行，</p>
            <p><a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>系统将为您分配唯一用户ID（格式为：TG_用户名），并与您亿人宝金融账户自动绑定，您无需修改和记忆。 </p>
          </div>
          <div class="pay-form">
            <h6>请输入您的银行卡信息</h6>
            <ul>
              <li>
                <label for="realname">银行卡号：</label>
          <input type="text" name="user_card" id="user_card"  class="input pay-txt" maxlength="24"   tabindex="1">
          <span id="user_cards"></span></li>
              </li>
              <li>
                <label for="idCard">开户行：</label>
                <input type="text" name="user_bank" id="user_bank" class="input pay-txt"  maxlength="24"   tabindex="1" >
          <span id="user_banks"></span></li>
                <div id="idCardErrorDiv">
                 
                </div>
              </li>
            </ul>
            <h6>@if($card_number!=0)
              身份证号已绑定
              @endif
              </h6>
            <ul>
              <li>
                @if($card_number!=0)
                <label for="phone">身份证号</label>
                <input type="hidden" name="form:j_idt98" value="15055100139">
                <label> <?php echo substr_replace($card_number,'******',4,11) ?></label>
                @endif
              </li>
              <li>
                <input type="submit" class="button btn-paykh button-block bg-main text-big input-big" value="绑定银行卡">
              </li>
            </ul>
          </div>
        </form>

        <div class="pay-tipcon"> 1、为切实保障投资人的利益，亿人宝金融将理财资金托管在<a href="http://www.htmlsucai.com" target="_blank">丰付第三方支付</a>平台。平台是2012年6月获批中国人民银行支付许可证和中国证监会基金支付许可的第三方支付公司，在金融支付领域业界领先地位。详情请登录<a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>官方网站查看。<br>
          2、根据相关法律规定，亿人宝金融在开通资金托管账户时，需要验证您的身份信息。该信息一经设置，无法修改，请慎重选择。为了确保您可以顺利提现，请确认您拥有一张使用该身份证开户的有效储蓄卡。<br>
          3、亿人宝金融将最大限度的尊重和保护您的个人隐私，详情请阅读<a href="/node/Candyprivacypolicy/RegistrationAgreement0001test" target="_blank">《亿人宝金融隐私条款》</a>。<br>
          4、您在开通第三方账号过程中，如有遇到问题，可以查看理财帮助，也可以联系我们的客服进行咨询，咨询电话：400-999-8850。 </div>
      </div>


    </div>
    <div class="clear"></div>
  </div>
</div>
<!--尾部-->
<?php include('layouts/foot.php') ?>
<!--尾部end-->
<script src="home/script/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="home/script/datepicker.js" type="text/javascript"></script>
</body>
</html>

<script type="text/javascript">
$(function(){
    var check ={
        'user_card':0,
        'user_bank':0
    }
    var user_card = $('#user_card');
    var user_bank=$('#user_bank');

    user_card.blur(function(){
      var val = $(this).val()

      var token = $('input[name=_token]').val()

      if(val==""){
        $('#user_cards').html('<font color="red">请输入银行卡号</font>')

      }else{

        $.ajax({
          type:'post',
          async: false,
          data:{user_card:val,_token:token},
          url:'binding_sole',
          success:function(data){
              if(data==1){
                 $('#user_cards').html('<font color="red">身份证号已存在</font>')
                  check.user_card=0;
              }else{
                  $('#user_cards').html('<font color="green">√</font>');
                  check.user_card=1;
              }
           }
        })
      }

  })

    user_bank.blur(function(){

        if(user_bank.val()==""){
            $('#user_banks').html('<font color="red">请输入开户银行</font>')
            check.user_bank=0;
        }else{
            $('#user_banks').html('<font color="green">√</font>')
            check.user_bank=1;
        }
    })

  $('form').submit(function () {

      if(check.user_card==1 && check.user_bank==1){

          return true;
      }else{

          return false;
      }


  })




})




</script>




















