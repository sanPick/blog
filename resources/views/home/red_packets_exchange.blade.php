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
    <label id="typeValue" style="display:none;"> </label>
    <div class="personal-main">
      <div class="personal-zqzr personal-xtxx" style="min-height: 500px;">
        <h3> <i>兑换历史</i> </h3>
        <div class="wdhb-title wdhb-dhls"> <span class="wdhb-yzm">验证码</span><span class="wdhb-con">兑换红包名称</span><span class="wdhb-deadline">兑换日期</span> </div>
        <form id="form" name="form" method="post" action="">
          <div class="zqzr-list">
            <ul>
              @foreach($list as $v)
              <li>
                <span class="wdhb-yzm">{{$v->name}}</span>
                <span class="wdhb-con">@if($v->use_state==0)
                  未使用
                  @else
                    已使用
                  @endif
                </span>
                <span class="wdhb-deadline">{{date('Y-m-d',$v->start_time)}}</span>
              </li>
              @endforeach

            </ul>
          </div>
          <!--<div style="float:left; width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
					 <img src="/site/themes/default/style/../home/images/nondata.png" width="60" height="60"><br><br>
					   暂无兑换记录</div>-->
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--网站底部-->
<?php
include('layouts/foot.php');
?>
<script src="home/script/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="home/script/datepicker.js" type="text/javascript"></script>
</body>
</html>
