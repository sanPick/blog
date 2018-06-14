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
    <!--用户中心菜单-->
    <?php include('layouts/user_ucenter.php') ?>
    <!--用户中心菜单end-->

    <!--投资记录-->
    <div class="personal-main">
		  <div class="personal-pay">
			  <h3><i>资金记录</i></h3>
			  <div class="quick-pay-wrap">
				  <h4>
					  <span class="ti-tit pay-cur"><em>提现记录</em></span>
					  <span class="online-tit"><em>投资记录</em></span>
					  <span class="chong-tit"><em>借款记录</em></span>
					  <span class="jie-tit"><em>充值记录</em></span>
				  </h4>

				  <div class="ti-main" style="border: 1px solid #dcdcdc;height: 100%;overflow: hidden;padding: 0 29px 30px;">
					  <div class="investnote-list">
						  <div class="investnote-contitle">
							  <span class="investnote-w1 fb">提现时间</span>
							  <span class="investnote-w2 fb">提现金额</span>
							  <span class="investnote-hbw4 fb">卡号</span>
							  <span class="investnote-hbw4 fb">手续费</span>

						  </div>
						  @if(!empty($ti))
						  @foreach($ti as $value)
							  <li style="border-bottom: 1px dashed #e6e6e6;float: left;font-size: 12px;line-height: 22px;padding: 20px 0;width: 760px;list-style-type:none;">

								  <span class="investnote-w1">{{date('Y-m-d',$value->time)}}</span>
								  <span class="investnote-w2">{{$value->cash}}元</span>
								  <span class="investnote-hbw4">尾号（{{substr($value->user_card,-4)}}）</span>
								  <span class="investnote-hbw4">{{$value->cash_formalities}}元</span>
							  </li>
						  @endforeach
						  @else
							  <div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
								  <img src="home/images/nondata.png" width="60" height="60"><br><br>
								  暂无投资记录</div>
						  @endif
					  </div>
				  </div>
				  <div class="online-main" style="display:none;">
					  <div class="investnote-list">
						  <div class="investnote-contitle">
							  <span class="investnote-w1 fb">投资时间</span>
							  <span class="investnote-w2 fb">投资金额</span>
							  <span class="investnote-w3 fb">收益</span>
						  </div>
						  @if(!empty($tou))
						  @foreach($tou as $v)
							  <li style="border-bottom: 1px dashed #e6e6e6;float: left;font-size: 12px;line-height: 22px;padding: 20px 0;width: 760px;list-style-type:none;">
								  <span class="investnote-w1">{{date('Y-m-d',$v->create_time)}}</span>
								  <span class="investnote-w2">{{$v->bid_money}}元</span>
								  <span class="investnote-w3">{{$v->each_grows}}元</span>
							  </li>
						  @endforeach
						  @else
							  <div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
								  <img src="home/images/nondata.png" width="60" height="60"><br><br>
								  暂无投资记录</div>
						  @endif
					  </div>
				  </div>
				  <div class="chong-main" style="display:none;border: 1px solid #dcdcdc;height: 100%;overflow: hidden;padding: 0 29px 30px;">
					  <div class="investnote-list">
						  <div class="investnote-contitle">
							  <span class="investnote-w2 fb">贷款编号</span>
							  <span class="investnote-w1 fb">贷款时间</span>
							  <span class="investnote-w3 fb">期限</span>
							  <span class="investnote-hbw4 fb">贷款金额</span>
							  <span class="investnote-hbw5 fb">贷款状态</span>

						  </div>
						  @if(!empty($jie))
						  @foreach($jie as $val)
							  <li style="border-bottom: 1px dashed #e6e6e6;float: left;font-size: 12px;line-height: 22px;padding: 20px 0;width: 800px;list-style-type:none;">
								  <span class="investnote-w2">{{$val->project_sn}}</span>
								  <span class="investnote-w1">{{date('Y-m-d',$val->create_time)}}</span>
								  <span class="investnote-w3">{{$val->term}}个月</span>
								  <span class="investnote-hbw4">{{$val->total_money}}元</span>
						<span class="investnote-hbw5">
							@if($val->product_status==0)
								借款中
							@else
								已放款
							@endif
						</span>

							  </li>
						  @endforeach
						  @else
							  <div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
								  <img src="home/images/nondata.png" width="60" height="60"><br><br>
								  暂无投资记录</div>
						  @endif
					  </div>

				  </div>
				  <div class="jie-main" style="display:none;border: 1px solid #dcdcdc;height: 100%;overflow: hidden;padding: 0 29px 30px;">
					  <div class="investnote-list">
						  <div class="investnote-contitle">
							  <span class="investnote-w1 fb">订单ID</span>
							  <span class="investnote-w2 fb">充值金额</span>
							  <span class="investnote-w2 fb">充值时间</span>

						  </div>
						  @if(!empty($chong))
						  @foreach($chong as $vv)
							  <li style="border-bottom: 1px dashed #e6e6e6;float: left;font-size: 12px;line-height: 22px;padding: 20px 0;width: 760px;list-style-type:none;">
								  <span class="investnote-w1">{{$vv->recharge_id}}</span>
								  <span class="investnote-w2">{{$vv->recharge_sum}}元</span>
								  <span class="investnote-w2">{{substr($vv->recharge_time,0,10)}}</span>

							  </li>
						  @endforeach
						  @else
							  <div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
								  <img src="home/images/nondata.png" width="60" height="60"><br><br>
								  暂无投资记录</div>
						  @endif
					  </div>


				  </div>

			  </div>
		  </div>



	  </div>

  </div>
    </div>
    <label id="typeValue" style="display:none;"> </label>
    <script>
		$(function(){
		    $('.ti-tit').click(function(){
		      
		      $(this).addClass('pay-cur');
		      $(this).siblings().removeClass('pay-cur');
		      $('.ti-main').show();
			  $('.chong-main').hide();
			  $('.jie-main').hide();
		      $('.online-main').hide();
		      
		      $(".pay-tipcon").hide();
		      $(".pay-tipcon2").show();

		    })

		    $('.online-tit').click(function(){

		      $(this).addClass('pay-cur');
		      $(this).siblings().removeClass('pay-cur');
		      $('.ti-main').hide();
			  $('.jie-main').hide();
			  $('.chong-main').hide();
		      $('.online-main').show();

		      $(".pay-tipcon2").hide();
		      $(".pay-tipcon").show();
		    })

			$('.chong-tit').click(function(){

				$(this).addClass('pay-cur');
				$(this).siblings().removeClass('pay-cur');
				$('.ti-main').hide();
				$('.jie-main').hide();
				$('.online-main').hide();
				$('.chong-main').show();

				$(".pay-tipcon2").hide();
				$(".pay-tipcon").show();
			})

			$('.jie-tit').click(function(){
				$(this).addClass('pay-cur');
				$(this).siblings().removeClass('pay-cur');
				$('.ti-main').hide();
				$('.chong-main').hide();
				$('.online-main').hide();
				$('.jie-main').show();

				$(".pay-tipcon2").hide();
				$(".pay-tipcon").show();
			})
	  });
		//<![CDATA[
			function showSpan(op){
				$("body").append("<div id='mask'></div>");
				$("#mask").addClass("mask").css("display","block");
	
				$("#"+op).css("display","block");
			}
	
			function displaySpan(op){
				$("#mask").css("display","none");
				$("#"+op).css("display","none");
			}
		//]]>
		</script>


</div>
<!--网站底部-->
<?php
include('layouts/foot.php');
?>
<script src="script/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="script/datepicker.js" type="text/javascript"></script>
</body>
</html>
