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
    <div class="registerTitle">完善用户信息</div>
    <div class="registerCont">
    <form action="evipadd" method="post" id="form"  class="form-x" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
      <ul>
        <li><span class="dis">真实姓名:</span>
          <input type="text" name="card_name" id="card_name"  class="input" maxlength="24"   tabindex="1">
          <span id="check_name" data-info="请填写真实姓名">请填写真实姓名</span></li>
        <li><span class="dis">身份证号：</span>
          <input type="text" name="card_number" id="card_number"  class="input _shenfen input-big" maxlength="24"  data-validate="required:请填写账号"  tabindex="1">
          <span id="check_num" data-info="请填写真实身份证号">请填写真实身份证号</span></li>
        <li> <span class="dis">身份证上传:</span>
          <input type="file" id="file"   class="input" name="card_img" style="border:none;" maxlength="20" tabindex="1">
    
<span id="emailAlt" data-info="请选择文件">请选择文件</span>
          </li>




        <li class="btn"><input type="submit"  class="button button-block bg-main text-big input-big"></a></li>
      </ul>
      </form>
    </div>
  </div>
</div>

<?php
include('layouts/foot.php');
?>
</div>
</body>
</html>
<script type="text/javascript">
  

$(function(){


  var card_name = $('#card_name')

    card_name.blur(function(){

      var val = $(this).val()
      var reg = /^[\u4E00-\u9FA5]{2,4}$/;
      if(!(reg.test(val))){
        $('#check_name').html('<font color="red">请输入正确姓名</font>')
        $('#check_num').removeAttr('a') 
        return false
      }else{
        $('#check_name').html('<font color="green">√</font>')
        $('#check_name').attr('a','a')
        return true
      }


  })


    /*
     根据〖中华人民共和国国家标准 GB 11643-1999〗中有关公民身份号码的规定，公民身份号码是特征组合码，由十七位数字本体码和一位数字校验码组成。排列顺序从左至右依次为：六位数字地址码，八位数字出生日期码，三位数字顺序码和一位数字校验码。
     地址码表示编码对象常住户口所在县(市、旗、区)的行政区划代码。
     出生日期码表示编码对象出生的年、月、日，其中年份用四位数字表示，年、月、日之间不用分隔符。
     顺序码表示同一地址码所标识的区域范围内，对同年、月、日出生的人员编定的顺序号。顺序码的奇数分给男性，偶数分给女性。
     校验码是根据前面十七位数字码，按照ISO 7064:1983.MOD 11-2校验码计算出来的检验码。

     出生日期计算方法。
     15位的身份证编码首先把出生年扩展为4位，简单的就是增加一个19或18,这样就包含了所有1800-1999年出生的人;
     2000年后出生的肯定都是18位的了没有这个烦恼，至于1800年前出生的,那啥那时应该还没身份证号这个东东，⊙﹏⊙b汗...
     下面是正则表达式:
     出生日期1800-2099  (18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])
     身份证正则表达式 /^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i
     15位校验规则 6位地址编码+6位出生日期+3位顺序号
     18位校验规则 6位地址编码+8位出生日期+3位顺序号+1位校验位

     校验位规则     公式:∑(ai×Wi)(mod 11)……………………………………(1)
     公式(1)中：
     i----表示号码字符从由至左包括校验码在内的位置序号；
     ai----表示第i位置上的号码字符值；
     Wi----示第i位置上的加权因子，其数值依据公式Wi=2^(n-1）(mod 11)计算得出。
     i 18 17 16 15 14 13 12 11 10 9 8 7 6 5 4 3 2 1
     Wi 7 9 10 5 8 4 2 1 6 3 7 9 10 5 8 4 2 1

     */
//身份证号合法性验证
//支持15位和18位身份证号
//支持地址编码、出生日期、校验位验证
    function IdentityCodeValid(code) {
        var city={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};
        var tip = "";
        var pass= true;

        if(!code || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(code)){
            tip = "身份证号格式错误";
            pass = false;
        }

        else if(!city[code.substr(0,2)]){
            tip = "地址编码错误";
            pass = false;
        }
        else{
            //18位身份证需要验证最后一位校验位
            if(code.length == 18){
                code = code.split('');
                //∑(ai×Wi)(mod 11)
                //加权因子
                var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
                //校验位
                var parity = [ 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ];
                var sum = 0;
                var ai = 0;
                var wi = 0;
                for (var i = 0; i < 17; i++)
                {
                    ai = code[i];
                    wi = factor[i];
                    sum += ai * wi;
                }
                var last = parity[sum % 11];
                if(parity[sum % 11] != code[17]){
                    tip = "校验位错误";
                    pass =false;
                }
            }
        }
        return pass;
    }




  var card_number = $('#card_number');

    card_number.blur(function(){
        var val = card_number.val();
        var token = $('input[name=_token]').val();
      if(!IdentityCodeValid(val)){
        $('#check_num').html('<font color="red">请输入正确身份证号</font>')
        $('#check_num').removeAttr('a');
        return false;
      }else{
        $.ajax({
          type:'post',
          async: false,
          data:{card_number:val,_token:token},
          url:'test_card_unique',
          success:function(data){
              if(data==0){
                 $('#check_num').html('<font color="red">身份证号已存在</font>')
                 $('#check_num').removeAttr('a')   
              }else{
                 $('#check_num').html('<font color="green">√</font>')
                 $('#check_num').attr('a','a')                
              }
           }
        })
      }

  })





})

  $(document).on('submit','#form',function(){
      var file = $('#file').val()

        if(file&&$('#check_name').attr('a')=='a'&& $('#check_num').attr('a')=='a'){
            return true
        }
        return false


  })


</script>
