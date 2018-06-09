@extends('article.common.base')
@section('content')    

<table border=1 >
	<tr>
		<td>还款表id</td>
		<td>用户名称</td>
		<td>产品类型名称</td>
		<td>借款表id</td>
		<td>产品名称</td>
		<td>还款金额（利息）</td>
		<td>还款金额（本息）</td>
		<td>还款总金额</td>
		<td>还款的日期</td>
		<td>还款状态</td>
	</tr>
	<?php foreach($arr as $k=>$v){ ?>
	<tr>
		<td><?= $v['rId']; ?></td>
		<td><?= $v['uname']; ?></td>
		<td><?= $v['catname']; ?></td>
		<td><?= $v['bid']; ?></td>
		<td><?= $v['proname']; ?></td>
		<td><?= $v['rePriceSharp']; ?></td>
		<td><?= $v['rePrice']; ?></td>
		<td><?= $v['rePriceSum']; ?></td>
		<td><?= $v['investTime']; ?></td>
		<td>
			<?php if($v['proStatus']==0){echo '未还款';}else{echo '已还款';} ?>
		</td>
	</tr>
	<?php } ?>
</table>
@endsection

