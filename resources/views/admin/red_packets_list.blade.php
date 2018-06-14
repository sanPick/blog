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
    <script type="text/javascript" src="/js/jquery.js"></script>

</head>
<body>
<form method="post" action="">

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 红包列表</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>用户名</th>
        <th>红包名称</th>
        <th>红包价值</th>
        <th>红包简介</th>
        <th>创建时间</th>
        <th>过期时间</th>
        <th>操作</th>
      </tr>
        @foreach($list as $v)
        <tr>
            <td><input type="checkbox" name="id[]" value="1" />
                {{$v->id}}
            </td>
            <td>{{$v->user_name}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->value}}</td>
            <td>{{$v->profiles}}</td>
            <td>{{date("Y-m-d",$v->start_time)}}</td>
            <td>{{date("Y-m-d",$v->end_time)}}</td>
            <td>@if($v->state==1)已兑换
                @else 未兑换
                @endif
            </td>
            <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div></td>

        </tr>

        @endforeach
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>

    </table>

  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

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
</script>

</body></html>