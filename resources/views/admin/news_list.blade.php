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
  {{--<a class="button border-yellow" href="/news_add"><span class="icon-plus-square-o"></span> 添加内容</a>--}}
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th>新闻标题</th>
        <th>新闻链接</th>
        <th>新闻类型</th>
        <th>添加时间</th>
      <th width="250">操作</th>
    </tr>
      @foreach($paginator as $k=>$v)
    <tr>
      <td>{{$v->news_id}}</td>
      <td>{{$v->news_title}}</td>
      <td>{{$v->news_link}}</td>
        @if($v->news_cat==1)
           <td>媒体报道</td>
        @else
            <td>理财知识</td>
        @endif
        @if( is_numeric($v->news_addtime))
            <td>{{date('Y-m-d H:i:s',$v->news_addtime)}}</td>
        @else
            <td>{{$v->news_addtime}}</td>
        @endif
      <td>
      <div class="button-group">
      <a type="button" class="button border-main"  href="/news_update?news_id={{$v->news_id}}"><span class="icon-edit"></span>修改</a>
       <a id="del" class="button border-red" href="javascript:void(0)" onclick="return del({{$v->news_id}})"><span class="icon-trash-o"></span> 删除</a>
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

            url: '/news_del',

            data: { news_id:id},

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