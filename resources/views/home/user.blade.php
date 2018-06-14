

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
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
  <script>
      $(document).ready(function() {
          var chart = {
              type: 'pie',
              options3d: {
                  enabled: true,
                  alpha: 45,
                  beta: 0
              }
          };
          var title = {
              text: '个人资产'
          };
          var tooltip = {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          };

          var plotOptions = {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  depth: 35,
                  dataLabels: {
                      enabled: true,
                      format: '{point.name}'
                  }
              }
          };
          var series= [{
              type: 'pie',
              name: 'Browser share',
               data: [
                              ['待收本金',   <?php echo $user->wait_shou_captital?>],
                              ['待收利息',   <?php echo $user->wait_shou_interest?>],
                              ['待还本金',   <?php echo $user->wait_huai_captital?>],
                              ['待还利息',   <?php echo $user->wait_huai_interest?>]

             ]  
        }];

          var json = {};
          json.chart = chart;
          json.title = title;
          json.tooltip = tooltip;
          json.plotOptions = plotOptions;
          json.series = series;
          $('#container').highcharts(json);
      });
  </script>
</head>
<body>
<!--头部-->
<?php include('layouts/header.blade.php') ?>
<!--头部end-->
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1200" height="96"></a></div>
    <!--用户中心菜单-->
    <?php include('layouts/user_ucenter.php') ?>
    <!--用户中心菜单end-->
    <div class="personal-main">
      <link rel="stylesheet" type="text/css" href="home/css/fileupload.less.css">
      <style type="text/css">
		.ui-fileupload-choose{
			background:none;
			width: 90px; height: 90px;
			border:0px none;
		}
		.ui-fileupload-choose input{
			width:100%;height:100%;
		}
		.ui-icon{
			background:none;
			width:0px;height:0px;
		} 
	</style>
      <div class="pmain-profile">
        <div class="pmain-welcome"> <span class="fl"><span id="outLogin">晚上好，</span><?php echo $user_name ?> 喝一杯下午茶，让心情放松一下~</span> <span class="fr">上次登录时间：
          <?php echo date('Y-m-d H:i:s',$userinfo) ?> </span> </div>
        <div class="pmain-user">
          <div class="user-head"> <span id="clickHeadImage" class="head-img" title="点击更换头像">
            <form  method="post" action="">
              <input type="hidden" name="userPhotoUploadForm" value="userPhotoUploadForm">
              <span id="userPhotoUploadForm:photo"><img id="userPhotoUploadForm:photoImage" src="home/images/touxiang.png" alt="" style="width:88px;height:88px;z-index:0;"> <i class="headframe" style="z-index:0;"></i>-
              <div id="userPhotoUploadForm:shangchuan-btn" class="ui-fileupload ui-widget" style="z-index:0;">
                <div class="ui-fileupload-buttonbar ui-corner-top"><span class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left ui-fileupload-choose" role="button"><span class="ui-button-icon-left ui-icon ui-c ui-icon-plusthick"></span><span class="ui-button-text ui-c"></span>
                  <input type="file" id="userPhotoUploadForm:shangchuan-btn_input" name="userPhotoUploadForm:shangchuan-btn_input" style="z-index:0;">
                  </span></div>
                <div class="ui-fileupload-content ui-widget-content ui-corner-bottom">
                  <table class="ui-fileupload-files">
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              </span>
              <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="2696547217205030168:-301641994240890871" autocomplete="off">
            </form>
            </span> <span class="head-icon"> <a href="#"><i title="第三方资金账户未认证" class="headiconbg headicon01"></i></a> <a href="#"><i class="headiconbg headicon2"></i></a> <a href="#"><i class="headiconbg headicon03"></i></a> </span> </div>
          <div class="user-info user-info1">
            <ul>
              <li>用户名<span><?php echo $user_name ?></span></li>
              <li>安全级别<span><i class="safe-level"><i class="onlevel" style="width:40%;"></i></i></span> <a href="#">[低]</a></li>
 
               <?php  if(empty($user_card))  { ?>
              <li>您还未绑定银行卡支付账户.请 <a class="pmain-log" href="binding">立即开通</a>以确保您的正常使用和资金安全。 </li>
                 <?php  }else{ ?>

                <li>已绑定银行卡支付账户</li>

                      <?php } ?>
                   

            </ul>
          </div>
        </div>
        <div class="pmain-money">
          <ul style="width:1000px;">
            <li class="none" style="width:150px;"><span><em>账户总额</em><i id="zhze" class="markicon"></i><span class="arrow-show1" style="display:none;">可用余额+待收本息</span><span class="icon-show1" style="display:none;"></span></span> <span class="truemoney"><i class="f24 fb">{{$user_assets}} </i> 元</span> </li>
            <li style="width:150px;"><span><em>待收本金</em><i id="dsbx" class="markicon"></i><span class="arrow-show2" style="display:none;">未到账的投资项目的本金、利息总额</span><span class="icon-show2" style="display:none;"></span></span> <span class="truemoney"><i class="f18 fb">{{$user->wait_shou_captital}} </i>元</span> </li>
            <li style="width:100px;"><span><em>待还本金</em><i id="wait_huai_captital" class="markicon"></i><span class="arrow-show4" style="display: none;">借款金额</span><span class="icon-show3" style="display: none;"></span></span> <span class="truemoney"><i class="f18 fb">{{$user->wait_huai_captital}} </i> 元</span> </li>
            <li style="width:100px;"><span><em>待还利息</em><i id="wait_huai_interest" class="markicon"></i><span class="arrow-show5" style="display: none;">借款所要还的利息</span><span class="icon-show3" style="display: none;"></span></span> <span class="truemoney"><i class="f18 fb">{{$user->wait_huai_interest}} </i> 元</span> </li>
            <li style="width:100px;"><span><em>待收利息</em><i id="ljsy" class="markicon"></i><span class="arrow-show3" style="display: none;">已到账的投资收益+未到账的投资收益</span><span class="icon-show3" style="display: none;"></span></span> <span class="truemoney"><i class="f18 fb c-pink">{{$user->wait_shou_interest}} </i> 元</span> </li>
          </ul>
        </div>
      </div>

      <script type="text/javascript">
			//<![CDATA[
			       $(function(){
			    	   $("#clickHeadImage").click(function(){
			    		   $(this).find('span').removeClass('ui-state-hover');
			    		   document.getElementById("userPhotoUploadForm:shangchuan-btn_input").click();
			    	   });
			    	   var safeLevel = "低";
			    	   if(safeLevel=="高"){
			    		   $(".pmain-user .user-info li .safe-level .onlevel").css("background-color","#f1483c");
			    	   }
			    	   
			    	   $("#clickHeadImage span").hover(function(){
			    		   $(this).removeClass('ui-state-hover');
			    	   });
			    	   
			    	   var myDate = new Date();
			    	   var h = myDate.getHours();
			    	   if(h>11 && h<19){
			    	   	 $("#outLogin").html("下午好，");
			    	   }else if(h>18){
			    	   	 $("#outLogin").html("晚上好，");
			    	   }else{
			    	   	 $("#outLogin").html("上午好，");
			    	   }
			       });
			//]]>           
		</script>




      <div id="container" style="width: 950px; height: 400px; margin: 0 auto"></div>

      <div class="pmain-connent">

        <div class="pmain-conmain" id="pmain-conmain">


        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>

<!--尾部-->
<?php include('layouts/foot.php') ?>
<!--尾部end-->
</body>
</html>
