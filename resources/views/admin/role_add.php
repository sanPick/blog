<!DOCTYPE html>
<html lang="zh-cn">
<head>
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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 角色添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="add_role_rn">
<input type="hidden" name="_token" value="<?= csrf_token() ?>">
      <div class="form-group">
        <div class="label">
          <label>角色名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="rote_name" value="" data-validate="required:请填写角色名称"  />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>角色描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="rote_desc" data-validate="required:请填写角色描述">
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>赋予权限：</label>
        </div>
        <div class="field">
          <div class="field" style="padding-top:8px;"> 
            <b>全选</b> <input id="checkall"  type="checkbox"  />
          </div>
          <?php foreach ($node_data as $key => $v): ?>
          <div class="field" style="padding-top:8px;"> 
            <b>全选</b> <input  name="checkrow"  type="checkbox" />
             <?= $v['node_title']; ?>(<?= $v['node_path']; ?>) <input class="ishome" name="checkbox[]" value="<?= $v['node_id']; ?>"  type="checkbox" />&nbsp;&nbsp;
             <?php foreach($v['son'] as $m=>$n){ ?>
               <?= $n['node_title']; ?>(<?= $n['node_path']; ?>) <input class="ishome" name="checkbox[]" value="<?= $n['node_id']; ?>"  type="checkbox" />&nbsp;&nbsp;
             <?php } ?>
             
          </div>
          <?php endforeach ?>
        </div>
      </div>
<script type="text/javascript">
    $(function(){
      $('#checkall').on('click',function(){

        if(this.checked){
          $('.ishome').prop('checked',true)
          $('input[name=checkrow]').prop('checked',true)
        }else{
          $('.ishome').prop('checked',false)
          $('input[name=checkrow]').prop('checked',false)
    
        }

      })

      $('input[name=checkrow]').click(function(){
        if(this.checked){
            $(this).siblings().prop('checked',true)
        }else{
           $(this).siblings().prop('checked',false)
    
        }          
      })
    })

</script>
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