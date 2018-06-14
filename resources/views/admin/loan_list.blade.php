
<span id="ppx">

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
    <script>
        $(function(){
            $('.btncat').click(function(){
 
                $(this).before('<span class="icon-check"></span>')
            })
        })
    </script>
</head>
<body>
<form method="post" action="">

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">借款列表</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span><em class="btncat">推荐项目</em></button>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span><em class="btncat">信用贷</em></button>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span><em class="btncat">高返利</em></button>


            类型：
            <select id="type" class="change">
            <option SELECTED value="">不限</option>
            <option value="1">房产</option>
            <option value="2">车辆</option>
            </select>
            期限：
            <select id="term" class="change">
            <option  SELECTED value="">不限</option>
            <option value="1">1-4个月</option>
            <option value="2">5-8个月</option>
            <option value="3">9-12个月</option>
            </select>
            年利率：
            <select id="rate" class="change">
            <option  SELECTED value="">不限</option>
            <option value="1">10%以下</option>
            <option value="2">10%-12%</option>
            <option value="3">12%-15%</option>
            </select>
            还款方式：
            <select id="repay_way" class="change">
            <option  SELECTED value="">不限</option>
            <option value="1">等额本息</option>
            <option value="2">到期连本带利</option>
           
            </select>

        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>id</th>
        <th>借款人姓名</th>
        <th>项目标题</th>
        <th>借款总额</th>
        <th>出借进度</th>
        <th>抵押物</th>
        <th>借款期限</th>
        <th>年利率</th>
         <th>创建时间</th>
         <th>还款方式</th>
         <th>标签</th>
        <th>操作</th>
      </tr>


        <tbody id="box">
        @foreach($list as $v)
        <tr>
            <td>{{$v->product_id}}</td>
            <td> {{$v->user_name}}</td>
            <td> {{$v->title}}</td>
            <td>{{$v->total_money}}</td>
            <td>{{sprintf("%.2f", $v->real_money/$v->total_money*100)}}%</td>
            <td>@if($v->type==1)房产
                @else 汽车
                @endif
            </td>
            <td>{{$v->term}}个月</td>
            <td>{{$v->rate}}%</td>
            <td>{{date('Y-m-d H:i',$v->create_time)}}</td>
            <td>@if($v->repay_way==1)
            等额本息
                @else
            到期还款
                @endif
            </td>
            <td>

                <select id="sel" opt="{{$v->product_id}}">
                    <option value="0">无</option>
                    @foreach($cate as $x=>$y)
                        <option @if($v->cate_id == $y->cate_id) 
                                selected = "selected"
                                @endif
                             value="{{$y->cate_id}}">{{$y->cate_name}}</option>
                    @endforeach
                </select>
                <span id="tbox"></span>
            </td>
            <td>
            @if($v->real_money/$v->total_money==1 and $v->product_status==0)
            <div class="button-group">
             <a class="button border-blue" href="javascript:void(0)"  onclick="fun({{$v->repay_way}},{{$v->user_id}},{{$v->total_money}},{{$v->rate}},{{$v->term}},this,{{$v->product_id}},{{$v->u_id}},{{$v->real_money}},{{$v->goods_id}})">
             放款并下架
             </a>
            </div>
            @elseif($v->product_status==1)
            <div class="button-group">
             <a class="button border-green" href="javascript:void(0)">
             <span class="icon-check"></span>已下架
             </a>
            </div>
            @endif
            </td>
            <!--<div class="button-group">
             <a class="button border-red" href="javascript:void(0)" onclick="return del(1)">
             <span class="icon-trash-o"></span>
             </a>
            </div>-->
        </tr>
        @endforeach
        </tbody>

    </table>
{!! $list->links() !!} 
  </div>
</form>
<script type="text/javascript">

function fun(repay_way,user_id,total_money,rate,term,obj,product_id,u_id,real_money,goods_id){

    if(confirm('确定放款该投资信息')){
         $.ajax({
            type: "get",
            url : "loan_check",
            data: {repay_way:repay_way,user_id:user_id,total_money:total_money,rate:rate,term:term,product_id:product_id,u_id:u_id,real_money:real_money,goods_id:goods_id},
            success: function(msg){
                if(msg==1){
                    obj.innerHTML = '<span class="icon-check"></span>放款成功'
                }
            }
        });       


    }


}



$(document).on('change','#sel',function(){
    var cate_id = $(this).val()
    var product_id = $(this).attr('opt')
    var _this = $(this)
         $.ajax({
            type: "get",
            url : "cate_change",
            data: {cate_id:cate_id,product_id:product_id},
            success: function(msg){
                if(msg==1){
                    _this.parent().find('#tbox').html('<span class="icon-check"></span>')
                }else if(msg==2){
                    alert('每个标签数量不能超过三个')
                }
            }
        });  
    

})











function del(id){
	if(confirm("您确定要删除吗?"))
    {

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

        if(confirm("您确定要审核通过吗?")){

        var goods_id=$(this).attr('goods_id');

        $.ajax({
            type: "get",
            url : "/is_check",
            data: {goods_id:goods_id},
            dataType:"json",
            success: function(msg){

                if(msg.code==1)
                {
                  alert(msg.message);
                  $('#sp').html("已审核");
                }
            }
        });
        }

    })

</script>




<script>



  function add0(m){return m<10?'0'+m:m }
    $(function(){

        $(".change").change(function(){
            var title=$("#title").val();
            var type=$("#type").val();
            var term=$("#term").val();
            var rate=$("#rate").val();
            var repay_way=$("#repay_way").val();

            $.ajax({
                type: "get",
                url : "/loan_search",
                data: {title:title,type:type,term:term,rate:rate,repay_way:repay_way},
                dataType:"json",
                success: function(msg){
                    var str="";
                    $.each(msg,function(k,v){

                        var st="";
                        if(v.type==1){
                            st="房产";
                        }else{
                            st="汽车";
                        }

                       var repay="";
                       if(v.repay_way==1){
                        repay="等额本息";
                       }else{
                        repay="到期连本带利";
                       }
                        

                        var jindu= Math.floor(v.real_money/v.total_money*100)+'%';

                     
                        var time = new Date(v.create_time*1000);

                        var year = time.getFullYear();
                        var month = time.getMonth()+1;
                        var date = time.getDate();
                        var hours = time.getHours();
                        var minutes = time.getMinutes();
                        var seconds = time.getSeconds();
                        var t=year+'-'+add0(month)+'-'+add0(date)+' '+add0(hours)+':'+add0(minutes)+':'+add0(seconds);

                        str+='<tr><td><input type="checkbox" name="id[]" value="1">'+v.product_id+'</td><td>'+ v.user_name+'</td><td>'+ v.title+'</td><td>'+v.total_money+'</td><td>'+jindu+'</td><td>'+st+'</td><td>'+ v.term+'个月</td><td>'+ v.rate+'%</td><td>'+t+'</td><td>'+repay+'</td><td><div class="button-group"><a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span>删除</a></div></td></tr>';
                    });

                    $('#box').html(str);
                }
            });

        })

    })

</script>
</body></html>
    </span>


</script>