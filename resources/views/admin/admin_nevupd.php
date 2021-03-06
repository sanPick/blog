<!DOCTYPE html>
<html lang="zh-cn">
<head>
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
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 导航修改</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="nev_upd">
      <div class="form-group">
        <div class="label">
          <label>导航名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="nev_name" value="<?=$nev_data->nev_name; ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
        <input type="hidden" name="nev_id" value="<?=$nev_data->nev_id; ?>">
        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
          <label>导航路由：</label>
        </div>
        <div class="field">
            <input type="text" class="input" name="nev_path" value="<?=$nev_data->nev_path; ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit">修改</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>