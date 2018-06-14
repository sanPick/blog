<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
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
    <?php include('layouts/user_ucenter.php') ?>
    <div class="personal-main">
      <div class="personal-money">
        <h3><i>充值记录</i></h3>
           </div>
          <span id="form:dataTable">
          <div class="personal-moneylist">
            <div class="pmain-contitle"> <span class="pmain-title1 fb">充值时间</span>

              <span class="pmain-title3 fb">交易金额</span>
            </div>
            <ul>
              @foreach($arr as $v)
              <li><span class="pmain-title1 pmain-height">{{$v->recharge_time}}</span>
                <span class="pmain-title3 pmain-height">{{$v->recharge_sum}}</span>
              @endforeach
           </ul>
          </div>
          </span>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--网站底部-->
<?php
include('layouts/foot.php');
?>
  <div class="ft-record">
    <div class="ft-approve clearfix"><a class="icon-approve approve-0 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-1 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-2 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-3 fadeIn-2s" target="_blank" href="#"></a></div>
    <div class="ft-identity">©2015 亿人宝 All rights reserved&nbsp;&nbsp;&nbsp;<span class="color-e6">|</span>&nbsp;&nbsp;&nbsp;安徽省亿人宝投资管理有限公司&nbsp;&nbsp;&nbsp;<span class="color-e6">|</span>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://www.htmlsucai.com">皖ICP备12345678号-1</a></div>
  </div>
</body>
</html>
