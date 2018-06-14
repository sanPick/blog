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
  <a class="button border-yellow" href="/adm_nav"><span class="icon-plus-square-o"></span> 添加内容</a>
  <a class="button border-blue" href="/adm_nav_save"><span class="icon-plus-square-o"></span> 更新后台导航</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">导航编号</th>
      <th width="20%">导航名称</th>
        <th>导航路由</th>
        <th>添加时间</th>
      <th width="250">操作</th>
    </tr>
<?php foreach($nev_data as $key=>$v){ ?>
    <tr>
<td><?= $v->nev_id; ?></td>
<td align="left"><?= str_repeat('--------',substr_count($v->path,'-')).$v->nev_name; ?></td>
<td><?= $v->nev_path; ?></td>
<td><?= date('Y-m-d H:i:s',$v->addtime); ?></td>
      <td>
      <div class="button-group">
      <a type="button" class="button border-main"  href="/nev_upd?id=<?= $v->nev_id; ?>"><span class="icon-edit"></span>修改</a>
       <a id="del" class="button border-red" href="nev_del/<?= $v->nev_id; ?>" ><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr>
<?php } ?>

  </table>

</div>
<script>

</script>


</body>
</html>