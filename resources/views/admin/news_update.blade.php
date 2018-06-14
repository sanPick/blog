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
    <form method="post" class="form-x" action="/news_update">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="news_title" value="{{$arr->news_title}}" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
        <input type="hidden" name="news_id" value="{{$arr->news_id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
          <label>新闻类型：</label>
        </div>
        <div class="field">
            <input type="text" class="input" name="news_cat" value="{{$arr->news_cat}}">
            <div class="tips">1：媒体报道 2：理财知识</div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>链接：</label>
        </div>
        <div class="field">
          <div class="field">
            <input type="text" class="input" name="news_link" value="{{$arr->news_link}}" />
          </div>
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