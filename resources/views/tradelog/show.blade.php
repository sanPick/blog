@extends('article.common.base')
@section('content')  


<form action="" method="post">
	产品名称：<input type="text" name='proname' >
	<input type="submit" value='搜索'>
</form>


<table border=1 >
	<tr>
		<td>交易流水编号</td>
		<td>用户名称</td>
		<td>财产类型</td>
		<td>交易金额</td>
		<td>交易日期</td>
		<td>产品名称</td>
	</tr>
	<?php foreach($arr as $k=>$v){ ?>
	<tr>
		<td><?= $v['tradeId']; ?></td>
		<td><?= $v['uname']; ?></td>
		<td>
			<?php if($v['tradeType']==0){echo '充值';}else if($v['tradeType']==1){echo '提现';}
			else if($v['tradeType']==2){echo '收益';}else{echo '支出';} ?>
		</td>
		<td><?= $v['tradeMoney']; ?></td>
		<td><?= $v['tradeTime']; ?></td>
		<td><?= $v['proname']; ?></td>
	</tr>
	<?php } ?>
</table>
@endsection

