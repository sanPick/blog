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
  <div class="panel-head"><strong><span class="icon-key"></span>红包添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="red_packets_add">
      <div class="form-group">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="field">
          <label style="line-height:33px;">

          </label>
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">红包金额：</label>
        </div>
        <div class="field">
          <select class="input w50" id="money" name="money">
            <option value="" selected> 请选择金额</option>
            @foreach($list as $k=>$v)
            {

            <option value="{{$v->r_id}}">{{$v->value}}元</option>

            }
       @endforeach
          </select>
        </div>
      </div>      

      <div class="form-group">
        <div class="label">
          <label for="sitename">数量：</label>
        </div>
        <div class="field">
          <select class="input w50" id="red_num" name="num">
            <option value="" selected> 请选择数量</option>
            <option value="10">10个</option>
            <option value="15">20个</option>
            <option value="20">20个</option>
          </select>

        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="button" id="red_add"> 提交</button>
        </div>
      </div>      
    </form>
  </div>
</div>
</body></html>

<script>
  $('#red_add').click(function(){

      var r_id=$('#money').val();
      var num=$('#red_num').val();

      $.ajax({
        type: "get",
        url : "red_packets_add_do",
        data: {r_id:r_id,num:num},
        dataType:"json",
        success: function(msg){
      if(msg.code==1){
          location.href='red_packets_addlist'
      }
        }
      });


  })

</script>

