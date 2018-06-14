<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="dehome/scription" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link href="home/css/index.css" rel="stylesheet" type="text/css">
<link href="home/css/detail.css" rel="stylesheet" type="text/css">
	<link href="home/css/base.css" rel="stylesheet">
<home/script type="text/javahome/script" src="home/script/jquery.min.js"></home/script>
<home/script type="text/javahome/script" src="home/script/common.js"></home/script>
<home/script src="home/script/ablumn.js"></home/script>
<home/script src="home/script/plugins.js"></home/script>
<home/script src="home/script/detail.js"></home/script>

	<script src="home/js/jquery-1.js" type="text/javascript"></script>
<style>
  *{
 padding: 0;
 margin: 0;
}
.content{
 width: 400px;
 margin: 0 auto;


}
.title{
 font-family: '微软雅黑';
 font-size: 16px;
}
.box{
 width: 190px;
 height: 30px;
 border:1px solid #ccc;
 margin-top: 10px;
 line-height: 30px;
}
.content .box,.forget{
 display: inline-block;
}
.content .forget{
 width: 100px;
 color:lightskyblue;
 vertical-align: super;
 font-size: 14px;
}
.box input.paw{
 width: 30px;
 height: 20px;
 line-height: 20px;
 margin-left: -9px;
 border:none;
 border-right: 1px dashed #ccc;
 text-align: center;
}
.box input.paw:nth-child(1){
 margin-left: 0;
}
.content .box .pawDiv:nth-child(6) input.paw{
 border: none;
}
.content .box input.paw:focus{outline:0;}
.content .box .pawDiv{
 display: inline-block;
 line-height: 30px;
 width: 31px;
 height: 31px;
 margin-top: -2px;
 float: left;
}
.point{
 font-size: 14px;
 color: #ccc;
 margin: 5px 0;
}
.errorPoint{
 color: red;
 display: none;
}
.getPasswordBtn{
 width: 100px;
 height: 30px;
 background-color: cornflowerblue;
 font-size: 14px;
 font-family: '微软雅黑';
 color: white;
 border: none;
}


</style>

</head>
<body>

<?php $product_id = isset($_GET['product_id'])?$_GET['product_id']:1; ?>
<?php include('layouts/header.blade.php'); ?>
<!--信息详细-->
<div class="item-detail wrap">
  <div class="breadcrumbs"> <a href="index.html">首页</a>&gt; <a href="#">散标投资列表</a>&gt; <span class="cur">项目详情</span> </div>
  <div class="item-detail-head clearfix" data-target="sideMenu">


    <div class="hd"> <i class="icon icon-che" title="车易贷"></i>
      <h2>{{$v->title}}</h2>
    </div>
    <div class="bd clearfix">
      <div class="data">
        <ul>
          <li> <span class="f16">借款金额</span><br>
            <span class="f30 c-333" id="account">{{$v->total_money}}</span>元 </li>
          <li class="relative"><span class="f16">年利率</span><br>
            <span class="f30 c-orange">{{$v->rate}}%  </span> </li>
          <li><span class="f16">借款期限</span><br>
            <span class="f30 c-333">{{$v->term}}</span>个月 </li>
          <li><span class="c-888">借款编号：</span>{{$v->project_sn}}</li>
          <li><span class="c-888">发标日期：</span>{{date("Y-m-d H:i:s",$v->create_time)}}</li>
          <li><span class="c-888">保障方式：</span>100%本息垫付</li>
          <li><span class="c-888">还款方式：</span>
          
          @if($v->repay_way==1)
            等额本息
          @else if($v->repay_way==2)
            到期连本带利
          @endif
          
          
          </li>
          <!--月利率=年利率/12，年利率=月利率*12-->
          <li><span class="c-888">需还本息：</span> {{sprintf("%.2f",$v->total_money*(($v->rate/100)/12)*$v->term)}}元 </li>
          <li><span class="c-888">借款用途：</span>{{$v->projects_use}}</li>
          <li class="colspan"> <span class="c-888 fl">投标进度：</span>
            <div class="progress-bar fl"> <span style="width:{{($v->real_money/$v->total_money)*100}}%"></span></div>
            <span class="c-green">{{sprintf("%.2f",($v->real_money/$v->total_money)*100)}}%</span> </li>
          <li> <span class="c-888">投资范围：</span> <span id="account_range"> 100元~
            20000元 </span> </li>
        </ul>
      </div>



      <div class="mod-right mod-status">

        <div class="inner">
          <div class="text">






	<div  class="spinner clearfix" >

					<td><strong style="display:none;">{{$v->rate}}</strong></td>

					<strong style="display:none;">{{$v->term}}</strong>
					<strong style="display:none;" id="startNum">100</strong>
					<input class="minIncAmount" value="100" type="hidden">
					<input class="maxInvestAmount" value="20000.0" type="hidden">
					<input class="productDetailId" value="c49c46a82846454f8a2d534b5d33c231" type="hidden">
			<p>
				已出借<span>{{$v->real_money}}
		</span>元</p>
			<p>
			<p class="rest">
				 剩余可出借金额<span class="orange" id="restNum">{{$v->total_money-$v->real_money}}
		</span>元</p>
    @if($loan_status == 1)
			<p>
				<span id="errorplace" class="red" style="display:none;color:#ff0000"></span>
						<!--购买按钮-->
						<div class="spinner clearfix">
            <input type="hidden"  id="hid" />
<input class="m-input-normal m-spinner icon-yuan png l value" style="width: 180px; float: left;" id="buyNum" value="400" data-max="1096000" data-min="1000" data-step="100" type="text">
            </div>
       期待总回报：<strong id="money" class="money">3.20</strong>元
               <p id="red_box" style="display:none;"><input type="checkbox" id="red_check" name="" id="" />使用红包 </p> 
									<input class="input_btn btn_orange" value="立即出借" style="width:262px;height:40px;line-height:40px;font-size:18px;" id="submitFinancesAmount" type="submit">
                  @endif




		<div style="display:none;">
		<table class="productDetail" style="table-layout:fixed" >
			<tbody><tr>
				<td class="dd">服务名称</td>
                <td>宜定盈_城市白领消费贷</td>
				
				
				
                <td class="dd">单笔最高可出借金额</td>
                
                    
                        
                        <td>2.0万元</td>
                    
                    
                
				<td class="dd">截止时间</td>
				
					
						<td><span id="day">03</span>天<span id="hour">12</span>小时<span id="minute">05</span>分<p></p>
							<!--这里的value值是本期宜定赢开始时间，请按照格式来~ 倒计时天数请不要超过99，因为设计只留了两位天数的位置 - -||| -->
							<input value="2017-06-25 23:59" id="theDay" type="hidden">
						</td>
					
					
				
			</tr>




		</tbody></table>
</div>

</div>
















      </div>
    </div>
  </div>
</div>


  <div class="item-detail-body clearfix mrt30 ui-tab">
    <div class="ui-tab-nav hd"> <i class="icon-cur" style="left: 39px;"></i>
      <ul>
        <li class="nav_li active" id="nav_1"><a href="javascript:;">借款信息</a></li>
        <li  id="nav_2"><a href="javascript:;">投资记录</a> <i class="icon icon-num1" style="margin-left: -15px;"> <span id="tender_times">23</span> <em></em> </i> </li>
        <li  id="nav_3"><a href="javascript:;">还款列表</a></li>
      </ul>
      <script>
        $('#nav_2').on('click',function(){
          $(this).attr('class','nav_li active')
            $(this).siblings().removeAttr('class')
            $('.nav2').attr('style','display:block');
            $('.nav1').attr('style','display:none')
            $('.nav3').attr('style','display:none')
            $('.icon-cur').attr('style','left: 200px;')
        })
        $('#nav_1').on('click',function(){
          $(this).attr('class','nav_li active')
          $(this).siblings().removeAttr('class')
            $('.nav1').attr('style','display:block');
            $('.nav2').attr('style','display:none')
            $('.nav3').attr('style','display:none')
            $('.icon-cur').attr('style','left: 50px;')
        })
        $('#nav_3').on('click',function(){
          $(this).attr('class','nav_li active')
          $(this).siblings().removeAttr('class')
            $('.nav1').attr('style','display:none');
            $('.nav2').attr('style','display:none')
            $('.nav3').attr('style','display:block')
            $('.icon-cur').attr('style','left: 340px;')
        })
      </script>
    </div>
    <div class="bd">
      <div class="ui-tab-item active nav1" style="display: block;">
        <div class="borrow-info">
          <dl class="item">
            <dt>
              <h3>借款人介绍</h3>
            </dt>
            <dd>
              <div class="text">
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人信息介绍：</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人赵女士，<span>1988</span>年出生，大专学历，未婚，户籍地址为四川省古蔺县，现居住于成都市成华区。</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人工作情况：</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 赵女士为成都某服装店老板，月收入<span>2</span>万元，收入居住稳定。</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人资产介绍：</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 赵女士有<span>1</span>辆全款长安福特福克斯汽车。</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 详细资金用途：</p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人申请汽车质押贷款，贷款用于资金周转。</p>
              </div>
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>审核信息</h3>
            </dt>
            <dd>
              <div class="verify clearfix">
                <ul>
                  <li><i class="icon icon-4"></i><br>
                    身份证</li>
                  <li><i class="icon icon-5"></i><br>
                    户口本</li>
                  <li><i class="icon icon-6"></i><br>
                    结婚证</li>
                  <li><i class="icon icon-7"></i><br>
                    工作证明</li>
                  <li><i class="icon icon-8"></i><br>
                    工资卡流水</li>
                  <li><i class="icon icon-9"></i><br>
                    收入证明</li>
                  <li><i class="icon icon-10"></i><br>
                    征信报告</li>
                  <li><i class="icon icon-11"></i><br>
                    亲属调查</li>
                  <li><i class="icon icon-19"></i><br>
                    行驶证</li>
                  <li><i class="icon icon-20"></i><br>
                    车辆登记证</li>
                  <li><i class="icon icon-21"></i><br>
                    车辆登记发票</li>
                  <li><i class="icon icon-22"></i><br>
                    车辆交强险</li>
                  <li><i class="icon icon-23"></i><br>
                    车辆商业保险</li>
                  <li><i class="icon icon-24"></i><br>
                    车辆评估认证</li>
                </ul>
              </div>
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>风控步骤</h3>
            </dt>
            <dd>
              <div class="text">
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 调查：风控部对借款人各项信息进行了全面的电话征信，一切资料真实可靠。<span></span> </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 抵押物：全款长安福特福克斯汽车，车牌号：川<span>AYY***</span>，新车购买于<span>2013</span>年，裸车价<span>14</span>万，评估价<span>5</span>万。 </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 权证：汽车已入库、已办理相关手续等。 </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 担保：质押物担保。 </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 结论：此客户为老客户，上笔贷款<span>4</span>万元，标的号为<span>20150745682</span>，已结清，现因资金周转，再次申请贷款。借款人居住稳定，收入来源可靠，经风控综合评估，同意放款<span>4</span>万。 </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 保障：借款逾期<span>48</span>小时内，易贷风险准备金先行垫付。 </p>
              </div>
              <div class="step clearfix">
                <ul>
                  <li><i class="icon icon-1"></i>资料审核</li>
                  <li><i class="icon icon-2"></i>实地调查</li>
                  <li><i class="icon icon-3"></i>资产评估</li>
                  <li class="no"><i class="icon icon-4"></i>发布借款</li>
                </ul>
              </div>
              <div class="conclusion f16"> 结论：经风控部综合评估， <span class="c-orange">同意放款40,000.00元；</span> <i class="icon icon-status icon-status1"></i> </div>
            </dd>
          </dl>
        
                    </span></div></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="ui-tab-item nav3" style="display: none;">
        <div class="repayment-list"> 已还本息：<span class="c-orange">{{$already_huai_benxi}}元</span>&nbsp;&nbsp;
          待还本息：<span class="c-orange">{{$wait_huai_benxi}}元</span>&nbsp;&nbsp;(待还本息因算法不同可能会存误差，实际金额以到账金额为准！)

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          @if($repayment)  
            <tbody>
              <tr>

            <th>还款日期</th>
            <th>期数</th>
            <th>需还金额</th>
            <th>每期本金</th>
            <th>每期利息</th>
             <th>还款状态</th>
           
              </tr>
               @foreach(@$repayment as $keu=>$val)
              <tr>
          <td>{{ date("Y-m-d",@$val->stages_time)}}</td>
          <td>第<font color="red">{{ @$val->stages_date}}</font>期</td>
            <td>{{ @$val->stages_money}}</td>
            <td>{{ @$val->stsges_principal}}</td>
            <td>{{ @$val->stages_Interest}}</td>
            
          <td>@if($val->status==0)
          还款中
            @else
            已还款
            @endif
          </td>
           
           
              </tr>
               @endforeach
@else

              <div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
                 <img src="home/images/nondata.png" width="60" height="60"><br><br>
                   暂无资金记录</div>


@endif
            </tbody>
            
          </table>
        </div>
      </div>

      <div class="ui-tab-item nav2" style="display: none;">
        <div class="repayment-list">目前已投标总额：<span class="c-orange">{{$v->real_money}}.00元</span>&nbsp;&nbsp;
         剩余投标金额：<span class="c-orange">{{$v->total_money-$v->real_money}}.00元</span>&nbsp;&nbsp;
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <th>投标人</th>
                <th>投标金额</th>
                <th>身份证号</th>
                <th>投标时间</th>

              </tr>
              @foreach($bids as $x=>$y)
              <tr>
                <td>{{$y->user_name}}</td>
                <td>{{$y->bid_money}}</td>
                <td>{{substr_replace($y->card_number,'*******',3,11)}}</td>
                <td>{{date('Y-n-d H:i:s',$y->create_time)}}</td>
              @endforeach
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<!--网站底部-->
<?php include('layouts/foot.php') ?>
<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
</body>
</html>
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>

<script type="text/javascript">
    var _adwq = _adwq || [];
    _adwq.push(['_setAccount', 'x59gd']);
    _adwq.push(['_setDomainName', '.yirendai.com']);
    _adwq.push(['_trackPageview']);

    (function() {
        var adw = document.createElement('script');
        adw.type = 'text/javascript';
        adw.async = true;
        adw.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://s') + '.emarbox.com/js/adw.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(adw, s);
    })();
</script>


<!-- 站内信collect埋点begin -->
<script>
    (function() {
            var collect = document.createElement('script');
            collect.type = 'text/javascript';
            collect.async = true;
            collect.src = ('https:' == document.location.protocol ? 'https://sdk.yirendai.com' : 'https://sdk.yirendai.com') + '/yrdsdk/collect.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(collect, s);
        }
    )();
</script>
<!-- 站内信collect埋点end -->

<!--footer1 end-->
<script src="home/js/yrd-ui.js" type="text/javascript"></script>
<script src="home/js/xxpl.js" type="text/javascript"></script>
<script src="home/js/query.js" type="text/javascript"></script>
<script src="home/js/paging.js" type="text/javascript"></script>
<script>
$(function(){

        (function(){
        $('.tabnav1,.tabnav2').click(function(){
            $(this).parent().toggleClass('tab');
        });
    })();
})
</script>
<!--[if IE 6]>
<script src="/static/js/DD_belatedPNG-min.js"></script>
<script>
	DD_belatedPNG.fix('.png');
</script>
<![endif]-->

<script>
	function hideError(){
		$("#errorplace").hide();
	}

	
	//宜定盈倒计时
	function count_down(o){
		var theDay=/^[\d]{4}-[\d]{1,2}-[\d]{1,2}( [\d]{1,2}:[\d]{1,2}(:[\d]{1,2})?)?$/ig,leftDay,leftHour,leftMinute,conn,s;
		if(!o.match(theDay)){
			//alert('从后台传入日期格式应为2012-01-01\r其中[]内的内容可省略');
			return false;
		}
		var sec=(new Date(o.replace(/-/ig,'/')).getTime() - new Date().getTime())/1000;
		if(sec > 0){
			conn='还有';
		}else{
			conn='已过去';
			sec*=-1;
		}
		s={day:sec/24/3600,hour:sec/3600%24,minute:sec/60%60};
		leftDay = Math.floor(s.day);
		leftHour = Math.floor(s.hour);
		leftMinute = Math.floor(s.minute);

		if(leftDay > 99) {//倒计时大于99天，不进行倒计时
			$("#day").text("99");
			$("#hour").text("23");
			$("#minute").text("59");
		} else {
			leftDay = leftDay < 10 ? '0'+leftDay : leftDay ;
			leftHour = leftHour < 10 ? '0'+leftHour : leftHour ;
			leftMinute = leftMinute < 10 ? '0'+leftMinute : leftMinute ;
			$("#day").text(leftDay);
			$("#hour").text(leftHour);
			$("#minute").text(leftMinute);
			setTimeout(function(){count_down(o)},1000);
		}
	}
	var getTime = $("#theDay").attr("value")
	count_down(getTime);
	

	function getIncome(){
		var amount =  parseInt($("#buyNum").val().replace(/,/g,'')),
				interval = parseInt($('input.minIncAmount').val()),
				limit = parseInt($('td.money').find('strong').text()),

		//rate = parseInt($('td.percent').find('strong').text()),//没用就先注掉，何必浪费资源
		//closePur = $('td.months').find('strong').text(),//没用就先注掉，何必浪费资源
				modified = true;
		//closePur = closePur / 12;

		if(!$.isNumeric(amount)){
			amount = limit;
		}else if(amount<limit){
			amount = limit;
		}else if(amount>limit){
			var balance = (amount-limit)%interval;
		  intervalSize = Math.floor((amount-limit)/interval);
			if(balance>0){
				intervalSize += 1;
			}else{
				modified = false;
			}
			amount = limit+intervalSize*interval;
		}else if(amount==limit){
			modified = false;
		}

		//计算预计收益
		var finPreIncomeRate = <?php echo ($v->rate/100)/12 ?>;
		var priIncome = amount*finPreIncomeRate;
    var mouth =  <?php echo $v->term ?>;

		
		var priIncome2Scale = Math.round(priIncome*100)/100;

		$("#money").text(Math.floor(priIncome2Scale.toFixed(2)*mouth*100)/100);
	}

	$(function(){
		function relo(a){
			a.click(function(){
				location.reload()
			})
		}
		relo($(".btn_gray")); //点击排队中刷新页面

		var rest = parseInt($("#restNum").text().replace(/,/g,'')),
				start = parseInt($("#startNum").text().replace(/,/g,'')),
				maxInvestAmount = parseInt($('input.maxInvestAmount').val())>rest||parseInt($('input.maxInvestAmount').val())==0?rest:parseInt($('input.maxInvestAmount').val()),
				defaultNum = rest>=1000 ? 1000 :rest;
		$(".m-tooltips").f2eUItooltips("提示：此期待年回报率已扣除相关手续费");
		var error = $("#errorplace");

		//输入框失焦
		$("#buyNum").on('blur',function(){
			var amount =$("#buyNum").val();
			var isdot =$("#buyNum").val().indexOf('.')!=-1?true:false; //是否是小数
			if(isNaN(amount)){
				$("#buyNum").val(defaultNum);
				error.text("金额须为100的整数倍").show();
			}
			else {
				if(amount==''){
					$("#buyNum").val(defaultNum);
				}
				else {
					if(amount<start){
						error.text("金额须大于等于最小出借金额").show();
					}
					if(amount>maxInvestAmount){
						$("#buyNum").val(maxInvestAmount);
						if(maxInvestAmount==rest){
							error.text("金额须小于等于剩余可出借金额").show();
						}
						else{
							error.text("金额须小于等于"+maxInvestAmount+"元").show();
						}
					}
					if(amount%100!==0 || isdot==true ){
						var restNum = amount%100;
						var newNum =( amount-restNum)+100;
						$("#buyNum").val(newNum);
						error.text("金额须为100的整数倍").show();
					}
				}
			}
			setTimeout("getIncome()",100)
			setTimeout("hideError()",2000)
		});
		$("#buyNum").f2eUIspinner({
			max:maxInvestAmount,
			min:start,
			step:1000,
			step2:start,
			value:defaultNum
		});
		getIncome();
		$(".increase,.decrease").on("click",function(){
			setTimeout("getIncome()",100)
		})
	})

  contents = '<div class="content"><div class="title">支付宝支付密码：</div><div class="box"></div><div class="forget"><a href="Account">忘记密码？</a></div><div class="point">请输入6位数字密码</div><p id="pay_tbox"></p><a href="javascript:void(0);"><button class="getPasswordBtn">确认支付</button></a><div class="errorPoint">请输入数字！</div></div>'
	$("#submitFinancesAmount").on('click',function(){

		amount = $.trim($("#buyNum").val()),
				productId = '99',
				fpid = $('input.productDetailId').val();
		if(amount!=""){
			
//用户没有实名认证
			<?php if($over_info->over_info==0){ ?>
			art.dialog({
				title: '身份验证',
				content: '<div class=""><h2>为了保障您的账户安全及出借权益，请您先进行身份验证。</h2></div>',
				resize:false,//可拉伸弹出框开关
				fixed:true,
				lock:true,//锁屏
				opacity:.7,//锁屏背景透明度
				background:'#000',//锁屏背景颜色
				drag:false,//拖动开关
				width:550,
				height:150,
				okVal: "立即验证",
				ok: function(){
					window.location.href= "evip";
				}
			});
      return false
			<?php } ?>
//用户没有设置支付密码
			<?php if($is_set==0){ ?>
			art.dialog({
				title: '请先设置支付密码',
				content: '<div class=""><h2>为了保障您的账户安全及出借权益，请您去个人中心设置您的支付密码哦，亲~~~。</h2></div>',
				resize:false,//可拉伸弹出框开关
				fixed:true,
				lock:true,//锁屏
				opacity:.7,//锁屏背景透明度
				background:'#000',//锁屏背景颜色
				drag:false,//拖动开关
				width:550,
				height:150,
				okVal: "立即去设置",
				ok: function(){
					window.location.href= "Account";
				}
			});

			<?php } ?>

//可以支付     
				<?php if($over_info->over_info==1&&$is_set==1){ ?>
			art.dialog({
				title: '需要付款'+amount+'元，请输入支付密码支付',
				content: contents,
				resize:false,//可拉伸弹出框开关
				fixed:true,
				lock:true,//锁屏
				opacity:.7,//锁屏背景透明度
				background:'#000',//锁屏背景颜色
				drag:false,//拖动开关
				width:550,
				height:150,


			});
box=document.getElementsByClassName("box")[0];
function createDIV(num){
 for(var i=0;i<num;i++){
  var pawDiv=document.createElement("div");
  pawDiv.className="pawDiv";
  box.appendChild(pawDiv);
  var paw=document.createElement("input");
  paw.type="password";
  paw.className="paw";
  paw.maxLength="1";
  paw.readOnly="readonly";
  pawDiv.appendChild(paw);
 }
}
createDIV(6);



var pawDiv=document.getElementsByClassName("pawDiv");
var paw=document.getElementsByClassName("paw");
var pawDivCount=pawDiv.length;
/*设置第一个输入框默认选中*/
pawDiv[0].setAttribute("style","border: 2px solid deepskyblue;");
paw[0].readOnly=false;
paw[0].focus();

var errorPoint=document.getElementsByClassName("errorPoint")[0];
/*绑定pawDiv点击事件*/

function func(){
 for(var i=0;i<pawDivCount;i++){
  pawDiv[i].addEventListener("click",function(){
   pawDivClick(this);
  });
  paw[i].onkeyup=function(event){
   console.log(event.keyCode);
   if(event.keyCode>=48&&event.keyCode<=57){
    /*输入0-9*/
    changeDiv();
    errorPoint.style.display="none";

   }else if(event.keyCode=="8") {
    /*退格回删事件*/
    firstDiv();

   }else if(event.keyCode=="13"){
    /*回车事件*/
    getPassword();

   }else{
    /*输入非0-9*/
    errorPoint.style.display="block";
    this.value="";
   }

  };
 }

}
func();


/*定义pawDiv点击事件*/
var pawDivClick=function(e){
 for(var i=0;i<pawDivCount;i++){
  pawDiv[i].setAttribute("style","border:none");
 }
 e.setAttribute("style","border: 2px solid deepskyblue;");
};


/*定义自动选中下一个输入框事件*/
var changeDiv=function(){
 for(var i=0;i<pawDivCount;i++){
  if(paw[i].value.length=="1"){
   /*处理当前输入框*/
   paw[i].blur();

   /*处理上一个输入框*/
   paw[i+1].focus();
   paw[i+1].readOnly=false;
   pawDivClick(pawDiv[i+1]);
  }
 }
};

/*回删时选中上一个输入框事件*/
var firstDiv=function(){
 for(var i=0;i<pawDivCount;i++){
  console.log(i);
  if(paw[i].value.length=="0"){
   /*处理当前输入框*/
   console.log(i);
   paw[i].blur();

   /*处理上一个输入框*/
   paw[i-1].focus();
   paw[i-1].readOnly=false;
   paw[i-1].value="";
   pawDivClick(pawDiv[i-1]);
   break;
  }
 }
};



/*获取输入密码*/
var getPassword=function(){
 var n="";
 var _token = $('input[name=_token]').val()
 var interest = $("#money").text()
 var  red50 = $('#red50').is(':checked') ? 1 : 0 ;
 var red100 = $('#red100').is(':checked') ? 1 : 0 ;

 product_id = '<?php echo $product_id ?>'
 for(var i=0;i<pawDivCount;i++){
  n+=paw[i].value;
 }
  $.ajax({
      type:'post',
      data:{pay_pass:n,_token:_token,interest:interest,amount:amount,product_id:product_id,red50:red50,red100:red100},
      url:'pay_pass_check',
      dataType:'json',
      success:function(msg){
        if(msg.error==1){
      art.dialog({
				title: '支付成功',
				content: '<div class=""><h2><font color="green">√ 投资成功，投资金额：'+amount+'，待收利息：'+interest+'，待收利息将每月按照百分比返回到您的账户！</font></h2></div>',
				resize:false,//可拉伸弹出框开关
				fixed:true,
				lock:true,//锁屏
				opacity:.7,//锁屏背景透明度
				background:'#000',//锁屏背景颜色
				drag:false,//拖动开关
				width:550,
				height:150,
				okVal: "返回",
				ok: function(){
          $('.aui_dialog').hide()
					window.location.href= "item_info?product_id="+product_id;
				}
			});  

        }
        if(msg.error==2){
          $('#pay_tbox').html('<font color="red">您的余额不足，请充值</font>')
        }
        if(msg.error==0){
          $('#pay_tbox').html('<font color="red">请输入正确的支付密码,错误次数剩余'+msg.pay_num+'次,超过指定次数将锁定您的账户</font>')
        }
        if(msg.error==3){
          $('#pay_tbox').html('<font color="red">这会儿访问较多，网络错误</font>')
        }
        if(msg.error==4){
          $('#pay_tbox').html('<font color="red">对不起,您错误次数过多,账户已锁定,请一天后再试,或者进入个人中心修改支付密码</font>')
        }
      }
  })
};
var getPasswordBtn=document.getElementsByClassName("getPasswordBtn")[0];

getPasswordBtn.addEventListener("click",getPassword);

/*键盘事件*/
document.onkeyup=function(event){
 if(event.keyCode=="13") {
  /*回车事件*/
  getPassword();
 }
};
			<?php } ?>		
			
			
		}
	})

  $(document).ready(function(){

    $('.increase').click(function(){
      if($('.value').val()/1>=2000){
        $('#red_box').removeAttr('style')

      }
      money = $('.value').val()
      if($('#red50').is(':checked')){
        money = money/1+50
      }
      if($('#red100').is(':checked')){
        money = money/1+100
      }
    })
    $('.decrease').click(function(){
      if($('.value').val()/1<=2000){
        $('#red_box').attr('style','display:none;')
        $('#red50box').attr('style','display:none;')
        $('#red100box').attr('style','display:none;')
        if($('.value').val() == '1950'){
          $('.value').val('2000') 
        }
        if($('.value').val() == '1900'){
          $('.value').val('2000') 
        }
        $('#red50').removeAttr('checked')
        $('#red100').removeAttr('checked')
      }  
      money = $('.value').val()
      if($('#red50').is(':checked')){
        money = money/1+50
      } 
      if($('#red100').is(':checked')){
        money = money/1+100
      } 
    }) 

  })

     $(document).on('click','#red_check',function(){
      <?php  if($red_50 == 1){ ?>
        if($(this).is(':checked')){
          $('#red_box').after('<span id="red50box"><input type="checkbox" id="red50"  />50元红包可使用</span>')

          $('#red50').click(function(){
            $(this).parent().siblings().find('#red100').removeAttr('checked')
            if($(this).is(':checked')){
              $('.value').val(money-50)
            }else{
              $('.value').val(money)
            }

          })
        }else{
          $('#red50box').remove()
        }
        <?php } ?>
        <?php  if($red_100 == 1){ ?>
        if($(this).is(':checked')&&money>=10000){

          $('#red_box').after('<span id="red100box"><input type="checkbox" id="red100" />100元红包可使用</span>')
         
          $('#red100').click(function(){
            $(this).parent().siblings().find('#red50').removeAttr('checked')
            if($(this).is(':checked')){
              $('.value').val(money-100)
            }else{
              $('.value').val(money)
            }

          })
        }else{
          $('#red100box').remove()
        }
          <?php } ?>

     })

</script>