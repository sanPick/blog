@extends('harticle.common.base')
@section('content')
<?php foreach($arr as $k=>$v){ ?>
<div class="block3_proone clearfix clear">
<span class="fl proone_left"><img src="./asdafa.jpg" ></span>
<!--  -->
<div class="fl proone_center">
	    <div class="clearfix">
 <span class="fl proone_center_span1"><?= $v['proName']; ?></span>
</div>
<ul class="clearfix proone_center_ul clear pt10">
	<li>产品金额:<span><?= $v['proPrice']; ?></span></li>
	<li>产品描述:<span><?= $v['description']; ?></span></li>
	<li>产品利率:<span><?= $v['proPriceRate']; ?></span></li>
	<li>该产品通过审核时间:<span><?= $v['startTime']; ?></span></li>
	<li>该产品结束时间:<span><?= $v['endTime']; ?></span></li>
	<li>产品库存量:<span><?= $v['proQuantity']; ?></span></li>
	<li>起投金额:<span><?= $v['invesMin']; ?></span></li>
	<li>最大可投:<span><?= $v['investMax']; ?></span></li>
	<li>已投金额:<span><?= $v['bought']; ?></span></li>
	<li>计息方式:<span><?= $v['interestRateMethod']; ?></span></li>
</ul>  
</div>
<!--  -->
<a href="11112/detail.html" class="block3_btn fl">立即投资</a>
</div>
<?php } ?>
@endsection