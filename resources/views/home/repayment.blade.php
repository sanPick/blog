<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .content{
            width: 400px;
            margin: 0 auto;


        }
        .title{
            font-family: '微软雅黑';
            font-size: 16px;
        }
        .box{
            width: 190px;
            height: 30px;
            border:1px solid #ccc;
            margin-top: 10px;
            line-height: 30px;
        }
        .content .box,.forget{
            display: inline-block;
        }
        .content .forget{
            width: 100px;
            color:lightskyblue;
            vertical-align: super;
            font-size: 14px;
        }
        .box input.paw{
            width: 30px;
            height: 20px;
            line-height: 20px;
            margin-left: -9px;
            border:none;
            border-right: 1px dashed #ccc;
            text-align: center;
        }
        .box input.paw:nth-child(1){
            margin-left: 0;
        }
        .content .box .pawDiv:nth-child(6) input.paw{
            border: none;
        }
        .content .box input.paw:focus{outline:0;}
        .content .box .pawDiv{
            display: inline-block;
            line-height: 30px;
            width: 31px;
            height: 31px;
            margin-top: -2px;
            float: left;
        }
        .point{
            font-size: 14px;
            color: #ccc;
            margin: 5px 0;
        }
        .errorPoint{
            color: red;
            display: none;
        }
        .getPasswordBtn{
            width: 100px;
            height: 30px;
            background-color: cornflowerblue;
            font-size: 14px;
            font-family: '微软雅黑';
            color: white;
            border: none;
        }


    </style>
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
<link rel="stylesheet" type="text/css" href="home/css/jquery.datetimepicker.css"/>
<link href="home/css/base.css" rel="stylesheet">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="home/text/javascript"></script>
<script src="home/js/jquery-1.js" type="text/javascript"></script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="home/images/clist1.jpg" width="1200" height="96"></div>
<?php
include('layouts/user_ucenter.php');
?>
    <div class="personal-main">
      <div class="personal-back">
        <h3><i>还款计划</i></h3>
@if($repayment)        
     <table  style="border:1px solid #0000FF;width:100%;">
        <tr>
          
            <th>款项编号</th>
            <th>借款标题</th>
            <th>借款人</th>
            <th>需还金额</th>
            <th>每期本金</th>
            <th>每期利息</th>
            <th>第几期</th>
            <th>还款方式</th>
            <th>借款方式</th>
            <th>还款日期</th>
            <th>操作</th>
            
        </tr>

         @foreach(@$repayment as $keu=>$val)
         <tr style="height:40px;">
           
            <th>{{ @$val->product_id}}</th>
            <th>{{ @$val->title}}</th>
            <th>{{ @$val->user_name}}</th>
            <th>{{ @$val->stages_money}}</th>
            <th>{{ @$val->stsges_principal}}</th>
            <th>{{ @$val->stages_Interest}}</th>
            <th>第<font color="red">{{ @$val->stages_date}}</font>期</th>
            <th>
              @if($val->stages_action==1)
                {{ '分期还款'}}
              @else
                 {{ '定期还款'}}
              @endif
            </th>
            <th>
              @if($val->goods_type==1)
                {{ '域名抵押'}}
              @else
                 {{ '车辆抵押'}}
              @endif
            </th>
            <th>{{ date("Y-m-d",@$val->stages_time)}}</th>

            <th><a href="javascript:;" class="stages" stsges_principal = "{{@$val->stsges_principal}}" issue="{{ @$val->stages_date}}" product_id="{{ @$val->product_id}}" stages_id="{{ @$val->stages_id}}"  user_stages = "{{ @$val->stages_money}}" stages_Interest="{{ @$val->stages_Interest}}" >还款</a></th>


        </tr>
 @endforeach

@else

              <div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
                 <img src="home/images/nondata.png" width="60" height="60"><br><br>
                   暂无资金记录</div>


@endif
      </table>

      <link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
   <script type="text/javascript">
   $('.stages').click(function(){
       contents = '<div class="content"><div class="title">输入支付密码：</div><div class="box"></div><div class="forget"><a href="Account">忘记密码？</a></div><div class="point">请输入6位数字密码</div><p id="pay_tbox"></p><a href="javascript:void(0);"><button class="getPasswordBtn">确认支付</button></a><div class="errorPoint">请输入数字！</div></div>'

       var issue = $(this).attr('issue')
       var product_id = $(this).attr('product_id')
      var stages_money = $(this).attr('user_stages')
      var stages_Interest = $(this).attr('stages_Interest')
      var stsges_principal = $(this).attr('stsges_principal')
      var _token = '<?php echo csrf_token() ?>'
      var _this = $(this)
      var stages_id = $(this).attr('stages_id')
       art.dialog({
           title: '需要付款元，'+stages_money+'请输入支付密码支付',
           content: contents,
           resize:false,//可拉伸弹出框开关
           fixed:true,
           lock:true,//锁屏
           opacity:.7,//锁屏背景透明度
           background:'#000',//锁屏背景颜色
           drag:false,//拖动开关
           width:550,
           height:150,


       });

       function relo(a){
           a.click(function(){
               location.reload()
           })
       }
       var box=document.getElementsByClassName("box")[0];
       function createDIV(num){
           for(var i=0;i<num;i++){
               var pawDiv=document.createElement("div");
               pawDiv.className="pawDiv";
               box.appendChild(pawDiv);
               var paw=document.createElement("input");
               paw.type="password";
               paw.className="paw";
               paw.maxLength="1";
               paw.readOnly="readonly";
               pawDiv.appendChild(paw);
           }
       }
       createDIV(6);



       var pawDiv=document.getElementsByClassName("pawDiv");
       var paw=document.getElementsByClassName("paw");
       var pawDivCount=pawDiv.length;
       /*设置第一个输入框默认选中*/
       pawDiv[0].setAttribute("style","border: 2px solid deepskyblue;");
       paw[0].readOnly=false;
       paw[0].focus();

       var errorPoint=document.getElementsByClassName("errorPoint")[0];
       /*绑定pawDiv点击事件*/

       function func(){
           for(var i=0;i<pawDivCount;i++){
               pawDiv[i].addEventListener("click",function(){
                   pawDivClick(this);
               });
               paw[i].onkeyup=function(event){
                   console.log(event.keyCode);
                   if(event.keyCode>=48&&event.keyCode<=57){
                       /*输入0-9*/
                       changeDiv();
                       errorPoint.style.display="none";

                   }else if(event.keyCode=="8") {
                       /*退格回删事件*/
                       firstDiv();

                   }else if(event.keyCode=="13"){
                       /*回车事件*/
                       getPassword();

                   }else{
                       /*输入非0-9*/
                       errorPoint.style.display="block";
                       this.value="";
                   }

               };
           }

       }
       func();


       /*定义pawDiv点击事件*/
       var pawDivClick=function(e){
           for(var i=0;i<pawDivCount;i++){
               pawDiv[i].setAttribute("style","border:none");
           }
           e.setAttribute("style","border: 2px solid deepskyblue;");
       };


       /*定义自动选中下一个输入框事件*/
       var changeDiv=function(){
           for(var i=0;i<pawDivCount;i++){
               if(paw[i].value.length=="1"){
                   /*处理当前输入框*/
                   paw[i].blur();

                   /*处理上一个输入框*/
                   paw[i+1].focus();
                   paw[i+1].readOnly=false;
                   pawDivClick(pawDiv[i+1]);
               }
           }
       };

       /*回删时选中上一个输入框事件*/
       var firstDiv=function(){
           for(var i=0;i<pawDivCount;i++){
               console.log(i);
               if(paw[i].value.length=="0"){
                   /*处理当前输入框*/
                   console.log(i);
                   paw[i].blur();

                   /*处理上一个输入框*/
                   paw[i-1].focus();
                   paw[i-1].readOnly=false;
                   paw[i-1].value="";
                   pawDivClick(pawDiv[i-1]);
                   break;
               }
           }
       };



       /*获取输入密码*/
       var getPassword=function(){

           var n="";
           for(var i=0;i<pawDivCount;i++){
               n+=paw[i].value;
           }




           $.ajax({
               type:'post',
               data:{pay_pass:n,stages_money:stages_money,_token:_token,stages_Interest:stages_Interest,stages_id:stages_id,issue:issue,product_id:product_id,stsges_principal:stsges_principal},
               url:'repayment',
               dataType:'json',
               success:function(data){

                   if(data.error == 1){
                       _this.parent().parent().remove()

                       art.dialog({
                           title: '还款成功',
                           content: '<p><img src="home/images/icon7.gif" alt="">还款成功,还剩余'+data.count+'期未还，请按时还款</p>',
                           resize:true,//可拉伸弹出框开关
                           fixed:true,
                           lock:true,//锁屏
                           opacity:.7,//锁屏背景透明度
                           background:'#000',//锁屏背景颜色
                           drag:false,//拖动开关
                           width:550,
                           height:150,
                           okVal: "确认",
                           ok: function(){
                               $('.aui_dialog').hide()
                           }
                       });





                   }else if(data.error == 5){
                       art.dialog({
                           title: '异常错误',
                           content: '<p>亲~~~发现不知名的错误了，请稍后再试</p>',
                           resize:true,//可拉伸弹出框开关
                           fixed:true,
                           lock:true,//锁屏
                           opacity:.7,//锁屏背景透明度
                           background:'#000',//锁屏背景颜色
                           drag:false,//拖动开关
                           width:350,
                           height:50,
                       });

                   }else if(data.error == 2){
                       art.dialog({
                           title: '提示',
                           content: '<p>您的余额不足，请及时充值还款</p>',
                           resize:true,//可拉伸弹出框开关
                           fixed:true,
                           lock:true,//锁屏
                           opacity:.7,//锁屏背景透明度
                           background:'#000',//锁屏背景颜色
                           drag:false,//拖动开关
                           width:350,
                           height:50,
                           okVal: "我要充值",
                           ok: function(){
                               window.location.href= "recharge";
                           }
                       });

                   }else if(data.error==0){
                       $('#pay_tbox').html('<font color="red">请输入正确的支付密码,错误次数剩余'+data.pay_num+'次,超过指定次数将锁定您的账户</font>')
                   }else if(msg.error==4){
                       $('#pay_tbox').html('<font color="red">对不起,您错误次数过多,账户已锁定,请一天后再试,或者进入个人中心修改支付密码</font>')
                   }
               }
           })
       };
       var getPasswordBtn=document.getElementsByClassName("getPasswordBtn")[0];

       getPasswordBtn.addEventListener("click",getPassword);

       /*键盘事件*/
       document.onkeyup=function(event){
           if(event.keyCode=="13") {
               /*回车事件*/
               getPassword();
           }
       };

   })
   /*动态生成*/

   </script>  
       
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!--网站底部-->
<?php 

 include('layouts/foot.php')
 ?>
<script src="home/script/jquery.datetimepicker.js" type="text/javascript"></script>
<script src="home/script/datepicker.js" type="text/javascript"></script>
</body>
</html>
