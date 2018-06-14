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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong>
   <div class="padding border-bottom">  
  <a class="button border-yellow" href="userexport"><span class="icon-plus-square-o"></span> 导出用户Excel</a>
  </div>  
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>     
      <th>用户名称</th>  
      <th>手机</th>  
      <th>邮箱</th>  
      <th>召回</th>      
      <th>是否完善信息</th>         
      <th>操作</th>
    </tr>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @foreach ($users as $user)
       
    <tr>
      <td>{{ $user->user_id }}</td>      
      <td>{{ $user->user_name }}</td>  
      <td>{{ $user->tel }}</td>      
      <td>{{ $user->email }}</td> 
      <td>
      <?php if( (strtotime(date("Y-m-d h:i:s",time()))-$user->last_time)>(3600*24*7)){?>
<a type="button" email="{{ $user->email }}" class="button border-red em " href="javascript:;"><span class="icon-edit"></span>邮件召回</a>
      <?php }else{?>
<a type="button" class="button border-green" href="javascript:;"><span class="icon-edit"></span>不需召回</a>
      <?php }?>
      </td>
      

      <td><?php 
      if ( $user->over_info == 2) {
        echo '<a type="button" class="button border-green" href="userinfo/'.$user->user_id.'"><span class="icon-edit"></span>去审核</a>';
      } else if( $user->over_info == 1) {
        echo '<a type="button" class="button border-main" href="userinfo/'.$user->user_id.'"><span class="icon-edit"></span>已经审核</a>';
      } else {
        echo '<a class="button border-red" href="javascript:void(0)" ><span class="icon-trash-o"></span> 未完善</a>';
      }
      

      ?></td>          
      <td>
      <div class="button-group">
       <a class="button border-red" href="javascript:void(0)" onclick="return del({{ $user->user_id }})"><span class="icon-trash-o"></span> 拉黑</a>
      </div>
      </td>
    </tr> 
    @endforeach
   
    
  </table>
  {!! $users->links() !!}
</div>
<script>

$(".em").click(function(){
  var email = $(this).attr('email');
  var _token = $("[name=_token]").val();
  var obj =$(this);
  $.post('/recall',{email:email,_token:_token},function(data){
         if(data == 1){
          str = '<a type="button" class="button border-blue" href="javascript:;"><span class="icon-edit"></span>发送成功</a>';
             obj.parent().html(str);
         }
     })  
})








function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}
</script>

</body></html>