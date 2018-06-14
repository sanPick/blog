<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="admin/css/pintuer.css">
    <link rel="stylesheet" href="admin/css/admin.css">
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="/article_add"><span class="icon-plus-square-o"></span> 添加内容</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th>文章标题</th>
        <th>文章内容</th>
        <th>添加时间</th>
      <th width="250">操作</th>
    </tr>
      @foreach($paginator as $k=>$v)
    <tr>
      <td>{{$v->article_id}}</td>
      <td>{{$v->article_title}}</td>
      <td>{{$v->article_content}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
      <td>
      <div class="button-group">
      <a type="button" class="button border-main"  href="/article_update?article_id={{$v->article_id}}"><span class="icon-edit"></span>修改</a>
       <a id="del" class="button border-red" href="javascript:void(0)" onclick="return del({{$v->article_id}})"><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr>
    @endforeach
  </table>
    {{ $paginator->render() }}
</div>
<script>
function del(id){
	if(confirm("您确定要删除吗?")){
        $.ajax({

            type: 'POST',

            url: '/article_del',

            data: { arcitle_id:id},

            dataType: 'json',

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            },

            success: function(data){

              $("#del").parents("tr").remove();

            }


        });
	}
}
</script>


</body>
</html>