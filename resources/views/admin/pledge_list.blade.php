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
    <div class="panel-head"><strong class="icon-reorder"> 质押物列表</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
  
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>用户名</th>
        <th>质押类型</th>
        <th>用户购买价值</th>
        <th>评估价值</th>
        <th>物品名称</th>
        <th>物品图片</th>
        <th>抵押状态</th>
        <th>是否审核</th>
        <th>操作</th>

      </tr>


        @foreach($list as $v)
        <tr>
            <td><input type="checkbox" name="id[]" value="1" />
                {{$v->goods_id}}
            </td>
            <td>{{$v->user_name}}</td>
            <td>@if($v->type==1)房产
                @else 汽车
                @endif
            </td>
            <td>{{$v->pre_money}}</td>
            <td class="vale_money{{$v->goods_id}}">{{$v->vale_money}}</td>
            <td>{{$v->goods_name}}</td>
            <td><img src="{{$v->goods_img}}" width="50" height="50"></td>
            <td>@if($v->status==1)抵押中
                @else 未抵押
                @endif
            </td>
            <td>@if($v->is_check==1)<div class="button-group"> <a class="button border-green" href="javascript:;">已审核</a></div> 
                @else<div class="button-group"> <a class="button border-red" href="javascript:;" id="is_check" user_id="{{$v->user_id}}" goods_name="{{$v->goods_name}}" goods_id="{{$v->goods_id}}"><span id="sp"> 未审核</span></a> </div>
                @endif
            </td>
            <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div></td>

        </tr>

        @endforeach
        <td colspan="8"><div class="pagelist"> </div></td>

    </table>
{!! $list->links() !!} 
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


<script>
    $('#is_check').click(function(){
        var vale_money = prompt('请输入用户抵押物评估的金额')
        var _token = '<?php echo csrf_token() ?>'
        if(isNaN(vale_money)){
            return false;
        }
        if(!vale_money){
            return false;
        }       
        var goods_id=$(this).attr('goods_id');
        var user_id = $(this).attr('user_id');
        var goods_name = $(this).attr('goods_name');
        $.ajax({
            type: "get",
            url : "/is_check",
            data: {goods_id:goods_id,vale_money:vale_money,user_id:user_id,_token:_token},
            dataType:"json",
            success: function(msg){

                if(msg.code==1)
                {
                  alert(msg.message);
                  $('.vale_money'+goods_id).html(msg.vale_money)
                  $('#sp').parent().addClass("button border-green")
                  $('#sp').html("已审核");
                }
            }
        });


    })

</script>
</body></html>