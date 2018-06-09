@extends('article.common.base')
@section('content')

<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
	<table>
		<tr>
			<td>图片上传：</td>
			<td><input type="file" name='img_path' ></td>
		</tr>
		<tr>
			<td>跳转路径：</td>
			<td><input type="text" name='img_html' ></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value='上传' ></td>
		</tr>
	</table>
</form>

@endsection