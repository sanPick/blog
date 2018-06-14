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
      <a class="button border-yellow" href="/admin_recharge_update"><span class="icon-plus-square-o"></span>内容更新</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
        <th width="5%">ID</th>
        <th>充值时间</th>
        <th>充值金额</th>
    </tr>
      @foreach($paginator as $k=>$v)
    <tr>
       <td>{{$v->recharge_id}}</td>
        <td>{{$v->recharge_time}}</td>
        <td>{{$v->recharge_sum}}</td>
    </tr>
    @endforeach
  </table>
    {{ $paginator->render() }}
</div>
</body>
</html>