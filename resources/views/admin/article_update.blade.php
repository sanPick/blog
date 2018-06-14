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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 文章信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/article_update">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="article_title" value="{{$arr->article_title}}" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
        <input type="hidden" name="article_id" value="{{$arr->article_id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
          <label>作者：</label>
        </div>
        <div class="field">
            <input type="text" class="input" name="address" value="{{$arr->address}}">
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea name="article_content"></textarea>
          <div class="tips"></div>
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