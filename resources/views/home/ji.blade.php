<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>p2p网贷平台</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="home/css/common.css" rel="stylesheet" />
	<link href="home/css/about.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="home/script/jquery.min.js"></script>
	<script type="text/javascript" src="home/script/common.js"></script>

	<link type="text/css" rel="stylesheet" href="forget/basic.css">
	<link type="text/css" rel="stylesheet" href="forget/index.css">
	<link type="text/css" rel="stylesheet" href="forget/iconfont.css">
	<link type="text/css" rel="stylesheet" href="forget/layer.css">
	<link type="text/css" rel="stylesheet" href="forget/call.css">

	<script type="text/javascript" src="forget/jquery-1.js"></script>
	<script type="text/javascript" src="forget/jquery.js"></script>
	<script type="text/javascript" src="forget/layer.js"></script><link rel="stylesheet" href="forget/layer.css" id="layui_layer_skinlayercss" style="">
	<script type="text/javascript" src="forget/function.js"></script>
	<script src="forget/browser_judgment.js"></script>

</head>
<body>


<?php
include('layouts/header.blade.php');
?>

<div class="center"><!--content-->
<div class="bg_color1 both">
	<div class="wl mtauto">
        <div class="crumbs">
        	<i class="iconfont location_icon"></i>您当前所在的位置：<a href="https://www.jiandai.com/web/index/index.html" class="fc_80">22世纪金融</a><em>&gt;</em>计算器</div>
    </div>
</div>

<div class="bg_color1">
	<div class="wl mtauto bg_color2 ofh">
    	<div class="invest-cal mt25">
        	<h4 class="pl25">利息计算器</h4>
            <div class="pl25 pr25 bd_e6 ofh">
            	<div class="fl dib">
                	<div class="cal-in mt30">
                        <span>借款金额：</span>
                        <input id="amount" type="text">
                        <span>元</span>
                    </div>
                    <div class="cal-in mt22">
                        <span>预期年化：</span>
                        <input id="rate" type="text">
                        <span>%</span>
                    </div>
                    <div class="cal-in mt22">
                        <span>借款期限：</span>
                        <input id="period" type="text">
                        <span>月</span>
                    </div>
                    <div class="cal-in mt22 ofh">
                        <span class="fl dib">还款方式：</span>
                        <div class="fl dib ml22 mt15">

		                <label class="radio-box">
							<input class="radiobox" checked="checked" name="cal-type" value="t1"  type="radio">每月还息</label>
                        </div>
                        <div class="fl dib ml50 mt15">
                        <label class="radio-box"><input class="radiobox" name="cal-type" value="t2" type="radio">等额本息</label>
                        </div>
                    </div>
                    <div class="mt18 mb30 ofh">
                    	<div class="cal-btn fl dib mr75 ml90" id="calculate">计算</div>
                        <div class="cal-btn-reset fl dib" id="reset">重置</div>
                    </div>
                </div>
                <div class="fr dib cal-results">
                	<div class="cal-results-tit fs16">计算结果</div>
                    <div class="ofh bd_e6">
                    	<div class="ofh bg_color7 bdbt_e6">
                    	<span class="dib fl fs14">预期本息收益</span><em class="cal-results-line1"></em><span class="dib fr fs14">预期利息收益</span>
                    	</div>
                        <div class="ofh"><span class="dib fl fs20 fc_red fstyle2 mt40" id="ben_xi">0.00元</span><em class="cal-results-line2"></em><span class="dib fr fs20 fc_red fstyle2 mt40" id="li_xi">0.00元</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="invest-cal mt12 mb30">
        	<h4 class="pl25">还款详细计划</h4>
            <div class="pl25 pr25 bd_e6 ofh">
            	<ul class="repay-plan">
                	<li class="repay-plan-tit">
                    	<span>期限</span>
                        <span>还款时间</span>
                        <span>还款总额</span>
                        <span>本金</span>
                        <span>利息</span>
                    </li>
                    <div id="result">

                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
//重置
$("#reset").click(function(){
	$("#amount").val('');
	$("#rate").val('');
	$("#period").val('');
	$("#ben_xi").html("0.00元");
	$("#li_xi").html("0.00元");
	$('input:radio[name="cal-type"]')[0].checked = true;
});


$("#amount").keyup(function(){
	var amount = $("#amount").val();
	if(isNaN(amount)) {
		$("#amount").val(0);
	}
});


$("#rate").keyup(function(){
	var rate = $("#rate").val();
	if(isNaN(rate)) {
		$("#rate").val(0);
	}
});

$("#period").keyup(function(){
	var period = $("#period").val();
	if(period%1 != 0) {
		$("#period").val(0);
	}
});


//计算
$("#calculate").click(function(){
	var amount = $("#amount").val().trim();
	var rate = $("#rate").val().trim();
	var period = $("#period").val().trim();
	var type = $('input:radio[name="cal-type"]:checked').val();



	if(amount<=0 || amount == '' || amount == null) {
		layer.alert('请输入出借金额', {icon:2});
		return false;
	}
	
	if(rate <= 0 || rate == '' || rate == null) {
		layer.alert('请输入年化利率', {icon:2});
		return false;
	}
	
	if(period <= 0 || period == '' || period == null) {
		layer.alert('请输入出借时长', {icon:2});
		return false;
	}
	
	amount = parseFloat(amount);
	rate = parseFloat(rate);
	period = parseFloat(period);
	
	if(type == 't1') {
		myhx(amount, rate, period);
	} else {
		debx(amount, rate, period);
	}
});

//等额本息
function debx(amount, rate, period) {
	//每月还款金额
	var month_rate = rate/100/12;
	amount = parseFloat(amount);
	var month_total = parseFloat(amount*month_rate*Math.pow((1+month_rate),period)/(Math.pow((1+month_rate), period)-1));
	month_total = parseFloat(month_total.toFixed(2));
	
	var total_amount = parseFloat((month_total*period).toFixed(2));
	var total_interest = parseFloat((total_amount-amount).toFixed(2));
	total_amount = (total_amount == null || total_amount == '' || total_amount == 0) ? '0.00' : total_amount;
	total_interest = (total_interest == null || total_interest == '' || total_interest == 0) ? '0.00' : total_interest;
	
	$("#ben_xi").html(formatMoney(total_amount.toString())+'元');
	$("#li_xi").html(formatMoney(total_interest.toString())+'元');
	
	
	var li = '';
	for(var i=1; i<=period; i++) {
		//月还利息
		var current_principal = parseFloat(amount*month_rate*Math.pow((1+month_rate), i-1)/(Math.pow((1+month_rate), period)-1));
		var current_interest = parseFloat(month_total)-parseFloat(current_principal);
		current_principal = current_principal.toFixed(2);
		current_interest = current_interest.toFixed(2);
		var date = getRefundDate(i);
		
		show_month_total = formatMoney(month_total);
		show_current_principal = formatMoney(current_principal);
		show_current_interest = formatMoney(current_interest);
		
		li += '<li>';
		li += '<span>第'+i+'期</span>';
		li += '<span>'+date+'</span>';
		li += '<span>'+show_month_total+'元</span>';
		li += '<span>'+show_current_principal+'元</span>';
		li += '<span>'+show_current_interest+'元</span>';
		li += '</li>';
	}
	
	$("#result").html(li);
}

//每月还息
function myhx(amount, rate, period) {
	amount = parseFloat(amount);
	rate = parseFloat(rate);
	period = parseInt(period);
	
	var rate_amount = amount*rate/1200;
	//四舍五入
		rate_amount = rate_amount.toFixed(2);
		rate_amount = parseFloat(rate_amount);
	
	var total_interest = rate_amount*period;
	show_total_amount = parseFloat(total_interest)+amount;
	
	$("#ben_xi").html(formatMoney(show_total_amount.toString())+"元");
	$("#li_xi").html(formatMoney(total_interest.toString())+"元");
	
	//取日期
	var myDate = new Date();
	var year = myDate.getFullYear();
	var month = myDate.getMonth();
	var date = myDate.getDate();
	
	var li = '';
	for(var i=1; i<=period; i++) {
		var total_amount = rate_amount;
		var principal = 0;
		if(i == period) {
			principal = amount;
			total_amount += principal;
		}
		
		var date_format = getRefundDate(i);
		
		total_amount_format = formatMoney(total_amount);
		principal_format = formatMoney(principal);
		rate_amount_format = formatMoney(rate_amount);
		
		li += '<li>';
		li += '<span>第'+i+'期</span>';
		li += '<span>'+date_format+'</span>';
		li += '<span>'+total_amount_format+'元</span>';
		li += '<span>'+principal_format+'元</span>';
		li += '<span>'+rate_amount_format+'元</span>';
		li += '</li>';
	}
	
	$("#result").html(li);
}


//获取每一期的还款时间
function getRefundDate(period) {
	var date = new Date();
	var new_date = new Date(date.setDate(date.getDate() + period*30));

	var year = new_date.getFullYear();
	var month = new_date.getMonth()+1;
	var date = new_date.getDate();

	return year+'-'+month+'-'+date;
}

//格式化资金
function formatMoney(v) {  
    if(isNaN(v)){  
        return v;  
    }  
    v = (Math.round((v - 0) * 100)) / 100;  
    v = (v == Math.floor(v)) ? v + ".00" : ((v * 10 == Math.floor(v * 10)) ? v  
            + "0" : v);  
    v = String(v);  
    var ps = v.split('.');  
    var whole = ps[0];  
    var sub = ps[1] ? '.' + ps[1] : '.00';  
    var r = /(\d+)(\d{3})/;  
    while (r.test(whole)) {  
        whole = whole.replace(r, '$1' + ',' + '$2');  
    }  
    v = whole + sub;  
      
    return v;  
} 


</script>



</div>

<!--网站底部-->
<?php
include('layouts/foot.php');
?>

</body></html>