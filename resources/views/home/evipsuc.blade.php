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
<script type="text/javascript" src="home/script/common.js"></script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<!--注册-->
<div class="wrap">
  <div class="tdbModule register">
    <div class="registerTitle">完善信息成功</div>

    <div class="registerCont">
      <ul>
        <li class="scses">亲爱的<?php echo session('user_name'); ?>用户，您的身份信息已完善</li>
        <li class="rz"><a href="ucenter" class="btn">进入我的账户</a><a href="#" class="blue"></a></li>
      </ul>
    </div>
  </div>
</div>
<!--网站底部-->
<?php
include('layouts/foot.php');
?>

</body>
</html>
