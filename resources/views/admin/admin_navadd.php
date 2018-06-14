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
  <div class="panel-head"><strong><span class="icon-key"></span> 后台导航添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="adm_nav">
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">父级导航：</label>
        </div>
        <div class="field">
          <select name="parent_id" id=""  class="input w50">
              <option value="0">添加新的父导航</option>
              <?php foreach($nev_data as $key=>$v){ ?>
              <option value="<?= $v->nev_id; ?>"><?= $v->nev_name; ?></option>
              <?php } ?>
              
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">导航名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="nev_name" size="50" placeholder="" data-validate="required:名称不能为空" />
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">导航路由：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="nev_path" size="50" placeholder="" data-validate="required:路由不能为空" />
        </div>
      </div>




      <div class="form-group">
        <div class="form-group">

      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
</body></html>