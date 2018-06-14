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
<link href="home/css/base.css" rel="stylesheet">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/js/jquery-1.js" type="text/javascript"></script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1000" height="80"></a></div>
    <div id="personal-left" class="personal-left">
<?php include('layouts/user_ucenter.php') ?>
    </div>
    <label id="typeValue" style="display:none;"> </label>
    <style type="text/css">
			.wdhb-tab .on  a{color:#fff;}
		</style>
    <div class="personal-main">
      <div class="personal-zqzr personal-xtxx" style="min-height: 500px;">
        <h3><i>我的红包</i></h3>
        <div class="lx-wdhb"> <span class="pay-title">兑换红包</span> <span class="pay-number">

          <form id="codeForm" name="codeForm" method="post" action="">
            <input  type="text" name="" value="<?php echo $red_code; ?>" class="pay-money-txt">
            <input type="button" name="codeForm:j_idt73" value="兑换" class="btn-dh">

              <input type="hidden" value="{{session('user_id')}}" class="user_"/>

            <span class="cz-error" style="display:none;"> <span class="error">红包兑换码不能为空！</span> </span>
          </form>

          <script>

	          </script>
          </span> </div>
        <form id="form" name="form" method="post" action="">
          
          <span id="form:dataTable">
          <div id="wdhb-tab" class="wdhb-tab">
            <ul>
              <li class="on"><span  title="未使用" class="red">未使用 </span> </li>
              <li><span  title="已使用" class="red">已使用 </span> </li>
              <li><span title="已过期" class="red">已过期 </span> </li>
            </ul>
          </div>

          <div class="wdhb-title"><span class="wdhb-name">红包名称</span><span class="wdhb-con">红包简介</span><span class="wdhb-deadline">截止日期</span> <span class="wdhb-status">状态</span> </div>

              @foreach($list as $v)
              <div class="zqzr-list">
            <ul>

              <li><span class="wdhb-name">{{$v->name}}</span>
                  <span class="wdhb-con">{{$v->profiles}}</span>
                  <span class="wdhb-deadline">{{date("Y-m-d",$v->end_time)}}</span>
                  <span class="wdhb-status">
                      @if($v->use_state==1) <a href="#">已使用</a>
                      @else  <a href="#">未使用</a>
                      @endif

                  </span></li>
            </ul>
          </div>
          @endforeach
          <!--<div style="float:left; width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
					 <img src="home/images/nondata.png" width="60" height="60"><br><br>
					   暂无红包记录</div>-->
          </span>
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
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
</body>
</html>

<script>

    $('.btn-dh').click(function(){

        var code=$('.pay-money-txt').val();
        var user_id=$('.user_').val();
        $.ajax({
            type: "get",
            url : "/exchange_red_packets",
            data: {code:code,user_id:user_id},
            dataType:"json",
            success: function(msg)
            {
                if(msg.code == 1){
                    art.dialog({
                      title: msg.info,
                      content: msg.info+'，可以用于投资使用',
                      resize:true,//可拉伸弹出框开关
                      fixed:true,
                      lock:true,//锁屏
                      opacity:.7,//锁屏背景透明度
                      background:'#000',//锁屏背景颜色
                      drag:false,//拖动开关
                      width:350,
                      height:50,
                      okVal: "确认",
                      ok: function(){
                        window.location.reload()
                          
                      }
                  }); 
                  
                }else if(msg.code == 0){
                    art.dialog({
                      title: msg.info,
                      content: msg.info,
                      resize:true,//可拉伸弹出框开关
                      fixed:true,
                      lock:true,//锁屏
                      opacity:.7,//锁屏背景透明度
                      background:'#000',//锁屏背景颜色
                      drag:false,//拖动开关
                      width:350,
                      height:50,
                      okVal: "确认",
                      ok: function(){
                        
                          
                      }
                  }); 
            }
                 
                }
        });

     })
</script>
