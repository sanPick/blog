<!DOCTYPE html>
<html lang="zh-cn">
<head>

  <meta name="_token" content="{{ csrf_token() }}"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
    <link rel="stylesheet" href="admin/css/pintuer.css">
    <link rel="stylesheet" href="admin/css/admin.css">
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/pintuer.js"></script>  
</head>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='adv_add'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">图片</th>
      <th width="15%">名称</th>
      <th width="10%">排序</th>
      <th width="15%">时间</th>
      <th width="15%">操作</th>
    </tr>
    @foreach($paginator as $k=>$v)
    <tr>
      <td>{{$v->id}}</td>
      <td><img src="{{$v->img}}" alt="" width="120" height="50" /></td>
      <td>{{$v->title}}</td>
      <td>{{$v->sort}}</td><td><?php echo date('Y-m-d H:i:s',$v->add_time) ?></td>
      <td><div class="button-group">
      <a class="button border-main" href="/adv_update?id={{$v->id}}"><span class="icon-edit"></span> 修改</a>
      <a  id="del" class="button border-red" href="javascript:void(0)" onclick="return del({{$v->id}})"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    @endforeach

  </table>
  {{ $paginator->render() }}
</div>
<script type="text/javascript">
function del(id){
    if(confirm("您确定要删除吗?")){
        $.ajax({

            type: 'POST',

            url: '/adv_del',

            data: { id:id},

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
</body></html>