@extends('article.common.base')
@section('content')    

<table border=1 >
	<tr>
		<td>借款表id</td>
		<td>用户名称</td>
		<td>产品类型名称</td>
		<td>平台和产品</td>
		<td>产品名称</td>
		<td>借款类型名称</td>
		<td>借款金额</td>
		<td>产品利率</td>
		<td>计息方式</td>
		<td>借款日期</td>
		<td>状态</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $k=>$v){ ?>
	<tr>
		<td><?= $v['bid']; ?></td>
		<td><?= $v['uname']; ?></td>
		<td><?= $v['catName']; ?></td>
		<td>
			<?php if($v['tWay']==0){echo '平台';}else{echo '产品';} ?>
		</td>
		<td><?= $v['proName']; ?></td>
		<td><?= $v['tname']; ?></td>
		<td><?= $v['bprice']; ?></td>
		<td><?= $v['proPriceRate']*100; ?>%</td>
		<td>
			<?php if($v['interestRateMethod']==0){echo '周';}else if($v['interestRateMethod']==1){echo '月';}
			else{echo '年';} ?>
		</td>
		<td><?= $v['applytime']; ?></td>
		<td>
			<?php if($v['bstatus']==0){echo '未审核';}else{echo '已借款';} ?>
		</td>
		<td value="<?= $v['bid']; ?>" >
			<?php if($v['bstatus']==0){echo "<a href='#' id='a' >审核</a>";}else{echo '审核';} ?>
		</td>
	</tr>
	<?php } ?>
</table>
<script src="../js/jquery-1.8.3.js"></script>
<script>


	$(document).on('click','#a',function(){
		$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		var that = $(this);
		var id = $(this).parent().attr('value');
		$.ajax({
			url:"bstatus",
			type:'post',
			data:{id:id},
			dataType:'json',
			success:function(data)
			{
                if(data.status==1)
                {
                	$(that).parent().prev().text('已借款');
                	$(that).parent().empty().text('审核');
                }
                else
                {
                	return false;
                }
			}
		})
	})
</script>
@endsection

