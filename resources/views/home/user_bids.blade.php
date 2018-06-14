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

  <script src="home/script/user.js" type="home/text/javascript"></script>
  <script src="home/js/jquery-1.js" type="text/javascript"></script>
</head>
<body>
<?php include('layouts/header.blade.php') ?>
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1200" height="96"></a></div>
    <div id="personal-left" class="personal-left">
<?php include('layouts/user_ucenter.php') ?>
    </div>
    <style type="text/css">
		.invest-tab .on  a{color:#fff;}
	</style>
    <div class="personal-main">
      <div class="personal-investnote">
        <h3><i>个人信誉</i></h3>
        <div class="investnote-money"> <span><b class="fb">累计投资</b><br>
          <i>{{$tatal_grow['user_total_bids']}}</i> 元 </span> <span><b class="fb">累计收益</b><br>
          <i class="c-pink">{{$tatal_grow['total_grow']}}</i> 元 </span> <span><b class="fb">待收本金</b><br>
          <i>{{$tatal_grow['wait_shou_captital']}}</i> 元 </span> <span class="none"><b class="fb">待收收益</b><br>
          <i>{{$tatal_grow['wait_shou_interest']}}</i> 元 </span> </div>
        <form id="form" name="form" method="post" action="">
          <script type="text/javascript">clearPage = function() {PrimeFaces.ab({source:'form:j_idt82',formId:'form',process:'form:j_idt82',params:arguments[0]});}</script>
          <span id="form:dataTable">
            
          
         <div id="box" style=" height: 260px; width: 940px;text-align: center;margin: 100px auto; background-color:#ffffff; margin-top: 100px; margin-bottom: 20px;">
        <center><canvas id="meter" width="360" height="220" style="padding-right:80px"></canvas></center>
        <span></span><br>
        <span style="padding-bottom: 50px"><canvas id="radar" width="1px" height="370"></canvas></span>
      </div>
            <a href="#" id="show">点击查看成长小技巧</a>
      <input type="hidden" name="_token" value="{{ csrf_token() }}" >
      <input type="hidden" name="user_id" value="<?php echo session('user_id')?>" >

      <script type="text/javascript" src="js/chart.meter.js"></script>
 <link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
      <script type="text/javascript">
        $("#show").click(function () {
            art.dialog({
                title: '<h4>信用成长小技巧，积分可以兑换现金红包喔</h4>',
                content: '<p>帮助别人的越多您所获得就更多</p><br><p>1、出借1000-3000积分成长5分</p><br><p>2、出借3000-6000积分成长7分</p><br><p>3、出借6000-10000积分成长10分</p><br><p>4、出借10000以上积分成长12分</p>',
                resize:true,//可拉伸弹出框开关
                fixed:true,
                lock:true,//锁屏
                opacity:.7,//锁屏背景透明度
                background:'#000',//锁屏背景颜色
                drag:false,//拖动开关
                width:450,
                height:100,
                okVal: "确认",
                ok: function(){

                }
            });
        })
        
        
        
          window.onload = function(){

              Meter.setOptions({
                  element: 'meter',
                  centerPoint: {
                      x: 180,
                      y: 180
                  },
                  radius: 180,
                  data: {
                      value:<?php echo $credits->credit_number?>,
                      title: '个人信誉度{t}',
                      subTitle: '<?php if(!empty($credits->assess_time)){?>
                      <?php echo '评估时间：'.$credits->assess_time?>
                       <?php }else{?>
                       <?php echo 'You are cainiao Plus'?>
                       <?php }?>',
                      area: [{
                          min: 350, max: 550, text: '较弱'
                      },{
                          min: 550, max: 600, text: '一般'
                      },{
                          min: 600, max: 650, text: '很强'
                      },{
                          min: 650, max: 700, text: '超强'
                      },{
                          min: 700, max: 950, text: '极强'
                      }]
                  }
              }).init();


          }

          // var result = 3000;
          // setInterval(assess,result);
          function assess() {
              var user_id = $("[name=user_id]").val();
              var _token = $("[name=_token]").val();
              $.post('asses',{user_id:user_id,_token:_token},function (msg) {

              })
          }
      </script>
          
          </span>
          
        </form>
        
      </div>
    </div>
    
    <div class="clear"></div>
  </div>

</div>

<?php include('layouts/foot.php') ?>
</body>
</html>
