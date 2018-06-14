<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
<link href="home/css/register.css" rel="stylesheet" type="text/css">
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
	
    <input id="investorValiCodeError" type="hidden" name="investorValiCodeError">
    <div class="personal-main">
      <div class="personal-pay">

           <!--注册-->
<div class="wrap">


		<div class="tdbModule loginPage">

    <div class="registerCont">
      <ul>
        <li class="scses"> <?php echo session('user_name') ?>， 恭喜您绑定银行卡成功！<br>
        @if($code!=0)
        红包兑换码：<?php echo $code; ?> 
        <a class="blue" href="my_red_packets?user_id=<?php echo session('user_id') ?>" >前往兑换</a></li>
        @endif
        <li class="rz"><a href="home_loan_list" class="btn">立即去投资</a><a href="#" class="blue"></a></li>
      </ul>
    </div>
		</div>
    <div class="investnote-list">
        

    </div>
</div>


 

      </div>
    
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php
include('layouts/foot.php');
?>
<script src="home/script/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="home/script/datepicker.js" type="text/javascript"></script>
</body>
</html>

















