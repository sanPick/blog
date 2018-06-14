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
<link href="home/css/base.css" rel="stylesheet">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="text/javascript"></script>
<script src="home/js/jquery-1.js" type="text/javascript"></script>
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
    <script type="text/javascript">
		
		</script>
    <input id="investorValiCodeError" type="hidden" name="investorValiCodeError">
    <div class="personal-main">
      <div class="personal-pay">

           <!--注册-->
<div class="wrap">


		<div class="tdbModule loginPage">

    <div class="registerCont">
    @if($is_check==0)
      <ul>
        <li class="scses"> <?php echo session('user_name') ?>， 提交信息成功！管理员正在审核中~~~审核通过即可放款</li>
        <li class="rz"><a href="ucenter" class="btn">返回个人中心</a><a href="#" class="blue"></a></li>
      </ul>
      @else
      
<div class="pay-form" >
<form >
      <ul>
        <li class="scses"> <?php echo session('user_name'); ?>， 您的审请已通过！您的<?php echo $goods_name; ?>申请下来的抵押物实际评估的价值是<span id="amount"><?php echo $vale_money; ?></span>，可以申请贷款</li>
 
        <li style="margin-left:150px;">
          <label for="realname">借款标题</label>
          <input type="text"  class="pay-txt"   name="title" placeholder="借款标题">
          <div id="title"></div>
        </li>
        <li style="margin-left:150px;">
          <label for="realname">借款年利率</label>
          <input type="text"  class="pay-txt" id="rate"    name="rate" placeholder="请输入8-15之间的数字">
          <div id="rate"></div>
        </li>

        <li style="margin-left:150px;">
          <label for="realname">借款月份</label>
          <input type="text"  class="pay-txt"  id="mouth"  name="term" placeholder="请输入1-36之间的数字">
          <div id="term"></div>
        </li>
         <li style="margin-left:150px;">
          <label for="realname">需还本利</label>
          <input type="text"  class="pay-txt" readOnly="true" disabled = "true" id="Interest_payable"  name="Interest_payable" value="0">
          <div id="Interest_payable"></div>
        </li> 
        <li style="margin-left:150px;">
          <label for="realname">借款用途</label>
          <input type="text"  class="pay-txt"   name="projects_use" placeholder="借款用途">
          <div id="projects_use"></div>
        </li>
     
        <li style="margin-left:150px;">
          <label for="realname">还款方式</label>
         等额本息 <input type="radio"    name="repay_way" value="1">

         到期连本带利 <input type="radio"    name="repay_way"  value="2" >
          <div id="repay_way"></div>
        </li>        
        <li class="rz" style="margin-left:250px;"><a href="javascript:void(0);" id="btn" class="btn">前往申请</a><a href="#" class="blue"></a></li>
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
        <input type="hidden" name="goods_id" value="<?php echo $goods_id ?>">
        <input type="hidden" name="total_money" value="<?php echo $vale_money ?>">

      </ul>   
</form>
</div>

    @endif
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

</body>
</html>
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
<script>


function test_title(){
    var title = $('input[name=title]').val()
    if(title == ''){
      $('#title').html('<font color=red>×</font>')
      return false
    }
    else{
      $('#title').html('<font color=green>√</font>')
      return true
    }
}
function test_rate(){
   var rate = $('input[name=rate]').val()
    if(rate/1<8 || rate/1>15 || rate.length>5){
      $('#rate').html('<font color=red>×</font>')
      return false
    }
    else{
       $('#rate').html('<font color=green>√</font>')
      return true
    }
}
function test_term(){
   var term = $('input[name=term]').val()
    
    if(term/1>36 || isNaN(parseInt(term/1))){
      $('#term').html('<font color=red>×</font>')
      return false
    }
    else{
       $('#term').html('<font color=green>√</font>')
      return true
    }
}

function test_projects_use(){
 var projects_use = $('input[name=projects_use]').val()
    if(projects_use == ''){
      $('#projects_use').html('<font color=red>×</font>')
      return false
    }
    else{
       $('#projects_use').html('<font color=green>√</font>')
      return true
    }
}
function test_repay_way(){
 var repay_way = $('input[name=repay_way]').val()
    if(repay_way == ''){
      $('#repay_way').html('<font color=red>×</font>')
      return false
    }
    else{
      $('#repay_way').html('<font color=green>√</font>')
      return true
    }
}

$('#rate').blur(function(){
    if(test_rate()&&test_term()){
      var rate = $('input[name=rate]').val()
      var term = $('input[name=term]').val()
      var amount = parseInt($('#amount').text())
      $('#Interest_payable').val(amount+Math.floor(amount/1*(rate/100/12*term/1)*100)/100);
    }
})
$('#mouth').blur(function(){
    if(test_rate()&&test_term()){
      var rate = $('input[name=rate]').val()
      var term = $('input[name=term]').val()
      var  amount = parseInt($('#amount').text())
      $('#Interest_payable').val(amount+Math.floor(amount/1*(rate/100/12*term/1)*100)/100);
    }
})

      $(document).on('click','#btn',function(){
             var title = $('input[name=title]').val()
             var rate = $('input[name=rate]').val()
             var term = $('input[name=term]').val()
             var  projects_use = $('input[name=projects_use]').val()
             var repay_way = $('input:radio[name="repay_way"]:checked').val();
             var  token = $('input[name=_token]').val()
             var  goods_id = $('input[name=goods_id]').val()
             var  amount = $('#amount').text()
        var Interest_payable = $('#Interest_payable').val()
        data = {goods_id:goods_id,title:title,rate:rate,term:term,projects_use:projects_use,repay_way:repay_way,_token:token,Interest_payable:Interest_payable,total_money:amount}
          if(test_title()&&test_rate()&&test_term()&&test_projects_use()&&test_repay_way()){
            $.ajax({
                type:'post',
                data:data,
                url:'user_pawnsuc',
                success:function(msg){
                  if(msg==1){
                      art.dialog({
                        title: '发布借款列表成功',
                        content: '<p>发布借款列表成功,满标后平台将于您的贷款金额发送到您的账户，适时请注意查收。</p>',
                        resize:true,//可拉伸弹出框开关
                        fixed:true,
                        lock:true,//锁屏
                        opacity:.7,//锁屏背景透明度
                        background:'#000',//锁屏背景颜色
                        drag:false,//拖动开关
                        width:450,
                        height:100,
                        okVal: "去投资列表查看",
                        ok: function(){
                          window.location.href= "unsetcok";
                        }
                      });
                  }else{
                       art.dialog({
                        title: '异常错误',
                        content: '<p>亲~~~发现不知名的错误了，请稍后再试</p>',
                        resize:true,//可拉伸弹出框开关
                        fixed:true,
                        lock:true,//锁屏
                        opacity:.7,//锁屏背景透明度
                        background:'#000',//锁屏背景颜色
                        drag:false,//拖动开关
                        width:350,
                        height:50,
                      });                   
                  }
                }
            })
          }
      })


</script>




















