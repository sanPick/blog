@extends('harticle.common.base')
@section('content')
<div class="zscf_banner_wper">
	<div class="zscf_banner px1000">
		  <div class="zscf_box">
		  	   <p>累计成交：<strong>12亿2332万元</strong></p>
		  	   <p>运营时间：<strong>123天</strong></p>
		  	   <p><strong>24</strong>小时成功转让率<strong>12.12%</strong></p>
		  	   <a href="#" class="btn btn1">立即登录</a><br>
		  	   <a href="#" class="btn btn2">立即注册</a>
		  </div>
	</div>
</div>
<?php foreach($arr as $k=>$v){ ?>
<div class="zscf_block2 mt30 clearfix ">
<div class="zscf_block2_l fl">
<div class="block2_biao clearfix">
<div class="clearfix">
<span class="fl"><?= $v['catName']; ?></span>
</div>
<ul class="clearfix clear block2_biao_ul">
	 <li>产品类型描述:<em><?= $v['description']; ?></em></li>
	 <li>
	 	产品利率最低<span><?= $v['proPriceCatMin']*100; ?>%</span>
	 </li>
	  <li>
	 	产品利率最高<span><?= $v['proPriceCatMax']*100; ?>%</span>
	 </li>
	 <li>
	 	 <a href="productShow?cateId=<?= $v['catId']; ?>" class="invest_btn">查看产品</a>
	 </li>
</ul>
</div>
</div>
</div>
<?php } ?>

@endsection
@section('content1')
<div class="zscf_partner mt30">
<h2 class="block3_tit clearfix "><span class="block3_curspan">合作伙伴</span></h2>
<div class="partner_con">
<div id="demo">
<div id="indemo">
<div id="demo1">
<?php foreach($data as $k=>$v){ ?>
	<a href="<?= $v['img_html']; ?>"><img src="<?= $v['img_path']; ?>" border="0" /></a>
<?php } ?>
</div>
<div id="demo2"></div>
</div>
</div>
<script>
				<!--
				var speed=10;
				var tab=document.getElementById("demo");
				var tab1=document.getElementById("demo1");
				var tab2=document.getElementById("demo2");
				tab2.innerHTML=tab1.innerHTML;
				function Marquee(){
				if(tab2.offsetWidth-tab.scrollLeft<=0)
				tab.scrollLeft-=tab1.offsetWidth
				else{
				tab.scrollLeft++;
				}
				}
				var MyMar=setInterval(Marquee,speed);
				tab.onmouseover=function() {clearInterval(MyMar)};
				tab.onmouseout=function()  {MyMar=setInterval(Marquee,speed)};
				-->
				</script>

          	 </div>
         </div>
@endsection