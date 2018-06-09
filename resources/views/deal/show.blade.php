@extends('article.common.base')
@section('content')    

<table border=1 >
	<tr>
		<td>交易id</td>
		<td>产品名称</td>
		<td>订单号</td>
		<td>用户名称</td>
		<td>产品金额</td>
		<td>购买数量</td>
		<td>交易总金额</td>
		<td>交易类型</td>
		<td>交易时间</td>
		<td>交易状态</td>
	</tr>
	<?php foreach($arr as $k=>$v){ ?>
	<tr>
		<td><?= $v['dealId']; ?></td>
		<td><?= $v['proName']; ?></td>
		<td><?= $v['orderTel']; ?></td>
		<td><?= $v['uname']; ?></td>
		<td><?= $v['price']; ?></td>
		<td><?= $v['buyNum']; ?></td>
		<td><?= $v['dealMoney']; ?></td>
		<td>
			<?php if($v['dealType']==0){echo '支付宝';}else if($v['dealType']==1){echo '微信';}
			else if($v['dealType']==2){echo '银行卡';}else{echo '平台余额';} ?>
		</td>
		<td><?= $v['dealTime']; ?></td>
		<td>
			<?php if($v['dealStatus']==0){echo '未成功';}else if($v['dealStatus']==1){echo '成功';}
			else if($v['dealStatus']==2){echo '支付失败';}else{echo '支付异常';} ?>
		</td>
	</tr>
	<?php } ?>
</table>
@endsection

