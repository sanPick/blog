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
            <th width="5%">管理员</th>
            <th>操作模块</th>
            <th>动作</th>
            <th>登录时间</th>
            <th width="250">操作时间</th>
        </tr>
        @foreach($log_arr as $k=>$v)
            <tr>

                <td>{{$v->admin_name}}</td>
                <td>{{$v->handle}}</td>
                <td>{{$v->action}}</td>
                <td>{{date('Y-m-d H:i:s',$v->login_time)}}</td>
                <td>{{date('Y-m-d H:i:s',$v->had_time)}}</td>
                <td>
                    <div class="button-group">
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $log_arr->render() }}
</div>
<script>






</script>


</body>
</html>