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
  <div class="panel-head"><strong><span class="icon-key"></span> 后台管理员添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="admin_add">
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员姓名：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="admin_name" size="50" placeholder="" data-validate="required:姓名不能为空" />
        </div>        
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" value="admin123" id="mpass" name="admin_pwd" size="50" placeholder="" data-validate="required:密码不能为空" />
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">手机号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="admin_tel" size="50" placeholder="" data-validate="required:手机号不能为空" />
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