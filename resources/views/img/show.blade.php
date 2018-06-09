@extends('article.common.base')
@section('content')
<table border=1>
	<tr>
		<td>轮播图编号</td>
		<td>轮播图片</td>
		<td>轮播图地址</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $k=>$v){ ?>
	<tr>
		<td><?= $v['img_id']; ?></td>
		<td><img src="<?= $v['img_path']; ?>" style="width:200px; height:200px;"></td>
		<td><?= $v['img_html']; ?></td>
		<td><a href="imgDel?img_id=<?= $v['img_id']; ?>">删除</a>|<a href="imgSave?img_id=<?= $v['img_id']; ?>">修改</a></td>
	</tr>
	<?php } ?>
</table>

@endsection