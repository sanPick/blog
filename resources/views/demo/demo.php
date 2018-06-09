<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>编号</td>
			<td>姓名</td>
			<td>操作</td>
		</tr>
		<?PHP foreach($arr as $k=>$v){ ?>
		<tr>
			<td><?= $v['id'] ?></td>
			<td><?= $v['name'] ?></td>
			<td><a href="#">删除</a></td>
		</tr>
		<?PHP } ?>
	</table>
</body>
</html>