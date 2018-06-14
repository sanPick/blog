<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<base href="<?=env('APP_URL')?>" />
<link rel="stylesheet" href="admin/css/pintuer.css">
<link rel="stylesheet" href="admin/css/admin.css">
<script src="admin/js/jquery.js"></script>
<script src="admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 查看用户身份信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">

      <div class="form-group">
        <div class="label">
          <label for="sitename">用户ID：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           {{ $user_info->user_id }}
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label for="sitename">用户真实姓名：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           {{ $user_info->card_name }}
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label for="sitename">用户身份证号码：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           {{ $user_info->card_number }}
          </label>
        </div>
      </div> 

      <div class="form-group">
        <div class="label">
          <label for="sitename">身份证信息：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           <img src="{{ $user_info->card_img }}" alt="图片" height="200px">
          </label>
        </div>
      </div>   

      <div class="form-group">
        <div class="label">
          <label for="sitename">是否审核：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           <?php 
                 if ( $user_info->over_info ==1) {
                   echo '<a type="button" class="button border-main" href="javascript:void(0)"><span class="icon-edit"></span>审核成功</a>';
                 } else {
                   echo '<a class="button border-red" href="javascript:void(0)" onclick="return check('. $user_info->user_id .',this)"><span class="icon-trash-o"></span> 未审核</a>';
                 }
                 

                 ?>
          </label>
        </div>
      </div>    
      
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
      </div>      
    </form>
  </div>
</div>
</body></html>
<script>
function check(id,obj){

  if(confirm("您确定审核通过吗?")){
    var _this = $(obj);
    console.log(_this.parent);
    $.ajax({
       type: "get",
       url: "<?=env('APP_URL')?>usercheck/"+id,
       success: function(msg){
         if (msg) {
          // _this.html('1');
          _this.parent().html('<a type="button" class="button border-main" href="javascript:void(0)"><span class="icon-edit"></span>审核成功</a>');
         };
       }
    });
  }
}
</script>