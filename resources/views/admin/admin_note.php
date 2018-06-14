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

<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 管理员权限分配</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>

        <th>管理员名称</th>
        <th>创建时间</th>
        <th >分配权限</th>
        <th>操作</th>       
      </tr>      

          <?php foreach($data as $key => $val){?>
          <tr>
          <td align="center"><?php echo $val->admin_id?> </td>
          <td align="center"><?php echo $val->admin_name?> </td>
          <td align="center"><?php echo date("Y-m-d H:i:s",$val->create_time)?>  </td>
          <td>
          
              <select name="rote_id"  class="input w10"  opt="<?php echo $val->admin_id?>" style="display:inline-block;">
                <?php foreach($rote as $m=>$n){ ?>
                 <option 
                 <?php if($n->rote_id==$val->rote_id) echo 'selected="selected"' ?>
                  value="<?= $n->rote_id; ?>"><?= $n->rote_name; ?></option> 
                <?php } ?>
               
              </select>
             <span id="tbox" style="color:green;display:inline-block;"></span>
          </td>
          <td><button type="button"  class="button border-red" id="checkall">remove</button></td>
          </tr>
          <?php }?>

    </table>
      <?php echo $data->links() ?> 
  <a class="button border-yellow" href="/admin_add"><span class="icon-plus-square-o"></span> 添加管理员</a>

  </div>

</form>
<script type="text/javascript">


$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}


$(function(){  
  $('select[name=rote_id]').on('change',function(){
    var rote_id = $(this).val()
    var admin_id = $(this).attr('opt')
    var token = $('input[name=_token]').val()
    var _this = $(this)
    var data = {rote_id:rote_id,admin_id:admin_id,_token:token}
      $.ajax({
        type:'post',
        data:data,
        url:'admin_note',
        success:function(data){
          if(data==1||data==2){
            _this.parent().find('#tbox').html('<span class="icon-check"></span>')
          }else if(data==0){
            _this.parent().find('#tbox').html('<span class="icon-check"></span>')
          }
        }
      })
  })

})
</script>
</body></html>