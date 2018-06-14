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
<script type="text/javascript" src="home/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/login.js" type="text/javascript"></script>
</head>
<body>

<?php
include('layouts/header.blade.php');
?>
<!--注册-->
<div class="wrap">
  <div class="tdbModule register">
    <div class="registerTitle">注册账户</div>
    <div class="registerLc1">
      <p class="p1">填写账户信息</p>
      <p class="p2">验证手机信息</p>
      <p class="p3">注册成功</p>
    </div>
    <div class="registerCont">
    <form action="regadd" method="post" id="form"  class="form-x">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
      <ul>
        <li><span class="dis">用户名:</span>
          <input type="text" name="user_name" id="userName" placeholder="请再次输入英文数字组成的用户名" class="input  input-big" maxlength="24"  data-validate="required:请填写账号"  tabindex="1">
          <span id="userNameAlt"></span></li>
        <li><span class="dis">密码:</span>
          <input type="password" name="password" id="password" placeholder="请输入密码" class="input" maxlength="24" tabindex="1">
          <span id="passwordAlt"></span></li>
        <li><span class="dis">确认密码:</span>
          <input type="password" name="repeatPassword" id="repeatPassword" placeholder="请再次输入密码" class="input _repeatPassword" maxlength="24" tabindex="1">
          <span id="repeatPasswordAlt" data-info="请再次输入密码"></span></li>
          <script type="text/javascript">
          $(function(){
            $('#repeatPassword').blur(function(){
              var pas = $('#repeatPassword').val()
              if(pas==''){
                  $('#repeatPasswordAlt').text('')
              }
              
            })
          })
          </script>
        <li> <span class="dis">邮箱:</span>
          <input type="email" id="email" placeholder="请输入邮箱" class="input" name="email" maxlength="20" tabindex="1">
    
<span id="emailAlt" data-info="请输入正确邮箱"></span>
          </li>
        <li class="telNumber"> <span class="dis">手机号码:</span>
          <input type="text" class="input _phoneNum" id="phone"  placeholder="请输入正确手机号" name="phone" tabindex="1" maxlength="11">
          <a href="javascript:void(0);" class="button radius1"  id="sendPhone">获取验证码</a> <span id="phoneJy" data-info="请输入您的常用电话">请输入您的常用电话</span></li>
        <li class="telNumber"><span class="dis">短信验证码:</span>
          <input id="phonVerify" type="text" class="input input1  _phonVerify" data-_id="phonVerify" tabindex="1">
          <span class="info" id="phonVerifys" data-info="请输入手机验证码">请输入手机验证码</span></li>
          <input type="hidden" name="invite_user_id" value="<?php $user_id =  isset($_GET['user_id'])?$_GET['user_id']:''; echo $user_id; ?>">
          @if(empty($user_id))
        <li> <span class="dis">推 荐 人:</span>
          <input type="text" class="input input1 _invist" name="invite_name">
          <span class="_invist_msg">请填写推荐人账户名，如无推荐人请留空</span> </li>
          @endif
        <li class="agree">
          <input name="protocol" id="protocol" type="checkbox" value="1" checked="checked">
          我同意《<a href="#" target="_black">跨世纪贷注册协议</a>》 <span id="protocolAlt" data-info="请查看协议">请查看协议</span></li>
        <li class="btn"><input type="submit"  class="button button-block bg-main text-big input-big"></a></li>
      </ul>
      
      </form>
  </div>
</div>
<script type="text/javascript">


//验证唯一
function test_unique(){

      var user_name = $('#userName').val()
      var email = $('#email').val()
      var phone = $('#phone').val()
      var invite_name = $('input[name=invite_name]').val()
      var token = $('input[name=_token]').val()
      var sms_code = $('#phonVerify').val()
      var data = {user_name:user_name,email:email,phone:phone,_token:token,invite_name:invite_name,sms_code:sms_code}
    
      if(user_name==''){
        return '00';
      }
      if(email==''){
        return '22';
      }
      if(phone==''){
        return '33';
      }

      $.ajax({
        type:'post',
        async: false,
        data:data,
        url:'test_unique',
        success:function(data){
          result = data
        }
      })

      return result


}


function test_user(){
    var user_name_pre =  /^[A-Za-z0-9]+$/;
    var user_name = $('#userName').val()

    if(user_name_pre.test(user_name)){
      $('#userNameAlt').html('<font color="green">用户名正确</font>')
      return true
    }
    else{
      return false
    }
}
function test_pwd(){
    var pwd_pre = /^[A-Za-z0-9]+$/;
    var password = $('#password').val()
    var repeatPassword = $('#repeatPassword').val()
    if(password!=repeatPassword){
        return false
    }
    if(pwd_pre.test(password)){
      return true
    } else{
      return false
    }
}
function test_email(){

    var email_pre = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ 
    var email = $('#email').val()
    if(email_pre.test(email)){
      return true
    }else{
      return false
    }
}


function test_phone(){


    var phone_pre = /^1\d{10}$/
    var phone = $('#phone').val()
    if(phone_pre.test(phone)){
        return true
    }else{
      return false
    }


}



//短信发送


  $(document).on('click','#sendPhone',function(){
      var phone_pre = /^1\d{10}$/;
      var phone = $('#phone').val();      
      var tel = $('#phone').val();
      var token = $('input[name=_token]').val();
      var countdown=60;
      var user_name = $('#userName').val()
      if(user_name == ''){
        return false
      }
        if(!test_phone()){
            return false
        }
        var   msg = test_unique()

        if(msg=='00'){
          $('#userNameAlt').html('<font color="red">用户名不能为空</font>')
          return false
        }
        if(msg=='22'){

          $('#emailAlt').html('<font color="red">邮箱不能为空</font>')
           $('#userNameAlt').html('<font color="green">√</font>')
           return false
        }
        if(msg=='33'){
          $('#userNameAlt').html('<font color="green">√</font>')
          $('#emailAlt').html('<font color="green">√</font>')
            $('#phoneJy').html('<font color="red">手机号不能为空</font>')
            return false          
        }
        if(msg==0){
            $('#userNameAlt').html('<font color="red">用户名已存在</font>')
            return false
        }
        else if(msg==2){
            $('#emailAlt').html('<font color="red">邮箱已存在</font>')
            $('#userNameAlt').html('<font color="green">√</font>')
            return false
        }
        else if(msg==3){
          $('#userNameAlt').html('<font color="green">√</font>')
          $('#emailAlt').html('<font color="green">√</font>')
            $('#phoneJy').html('<font color="red">手机号已存在</font>')
            return false
        }else if(msg==4){
          $('#userNameAlt').html('<font color="green">√</font>')
          $('#emailAlt').html('<font color="green">√</font>')
          $('#phoneJy').html('<font color="green">√</font>')
          $('._invist_msg').html('<font color="red">推荐人账户名不存在</font>')
          return false
        }
      
      if(!($(this).attr('opt'))){
            wait = time($(this))
      }
      if(wait<59){
        return false
      }
      if(phone_pre.test(phone)){
            $.ajax({
              type:'post',
              data:{tel:tel,_token:token},
              url:'sms',
              success:function(data){
               
              }
            })
      }else{
       $('#phoneJy').html('<font color="red">手机号格式不正确</font>')
      }
     countdown--
    })

var wait=60;
$("#send_pwd").attr("disabled",false);
function time(o) {
    if (wait == 0) {
        o.removeAttr("opt");           
        o.html("获取验证码");
        wait = 60;
    } else { // www.jbxue.com
        o.attr("opt", 1);
        o.html(wait +"秒后可重发");
        wait--;
        setTimeout(function() {
            time(o)
        },
        1000)
    }
    return wait
}

  $(document).on('submit','#form',function(){
      var user_name = $('#userName').val()
      if(user_name == ''){
        return false
      }

   var msg = test_unique()

      if(msg==0){
          $('#userNameAlt').html('<font color="red">用户名已存在</font>')
           return false
      }
      else if(msg==2){
          $('#emailAlt').html('<font color="red">邮箱已存在</font>')
          $('#userNameAlt').html('<font color="green">√</font>')
           return false
      }
      else if(msg==3){
        $('#userNameAlt').html('<font color="green">√</font>')
        $('#emailAlt').html('<font color="green">√</font>')
          $('#phoneJy').html('<font color="red">手机号已存在</font>')
          return false
      }else if(msg==4){
        $('#userNameAlt').html('<font color="green">√</font>')
        $('#emailAlt').html('<font color="green">√</font>')
        $('#phoneJy').html('<font color="green">√</font>')
        $('._invist_msg').html('<font color="red">推荐人账户名不存在</font>')
        return false
      }else if(msg==5){
        $('#phonVerifys').html('<font color="red">请输入正确的手机验证码</font>')
        return false 
      }else{
        $('#phonVerifys').html('<font color="green">√</font>')
          var protocol = $('#protocol').is(':checked')
          if(test_user()&&test_pwd()&&test_email()&&test_phone()&&protocol){
            return true
          }else{
            return false;
          }
          
      }


  })








</script>
<?php
include('layouts/foot.php');
?>
</div>
</body>
</html>
