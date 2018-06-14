<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
<link href="home/css/base.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="home/css/jquery.datetimepicker.css"/>
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="text/javascript"></script>
<script src="home/js/jquery-1.js" type="text/javascript"></script>

<style>
	*{
 padding: 0;
 margin: 0;
}
.content{
 width: 400px;
 height: 50px;
 margin: 0 auto;
 margin-top: 100px;
 
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
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1200" height="96"></a></div>
      <?php include('layouts/user_ucenter.php') ?>
    <label id="typeValue" style="display:none;"> </label>
  
    <div class="personal-main">
      <div class="personal-deposit">
        <h3><i>提现</i></h3>
          <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}" >
          <div class="deposit-form" style="margin-top:0px;border-top:0px none;">
            <h6>填写提现金额</h6>
            <ul>
              <li> <span class="deposit-formleft">可用金额</span> <span class="deposit-formright"> <i>
                    <input type="hidden" id="user_assets" value="<?php echo $uss->user_assets?>">
                <label id="form:blance" class="ke" ke="<?php echo $uss->user_assets?>"><?php echo $uss->user_assets?></label>
                </i>元 </span> </li>
              <li> <span class="deposit-formleft">银行卡</span><span class="deposit-formright">
                <select name="user_card" id="deposite-txt" >
                 <?php foreach ($arr as $v){?>
                  <option value="<?php echo $v['user_card']?>">
                      <?php echo $v['user_bank']?>尾号（<?php echo substr($v['user_card'],-4)?>）
                  </option>
                  <?php }?>
                </select></span>
              </li>
              <li> <span class="deposit-formleft">提现金额</span><span class="deposit-formright">
                <input type="text" name="cash" id="cash" class="deposite-txt" maxlength="10" placeholder="在此输入金额" >
                元 </span> <span id="actualMoneyErrorDiv"><span  id="actualMoney_message" style="display:none" class="error"></span></span> </li>
              <li> <span class="deposit-formleft">提现费用</span> <em id="txfy" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="formalities"> 0.00</label>
                </i>元 </span> <span class="txarrow-show">提现金额的0.1%，最低不低于2元，最高100元封顶</span><span class="txicon-show"></span> </li>
              <li><span class="deposit-formleft">实际到账金额</span> <em id="dzje" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="new_cash"> 0.00</label>
                </i> 元</span> <span class="dzarrow-show">提现金额 - 提现费用</span><span class="dzicon-show"></span> </li>
              <li>
                <input type="button" value="提现" class="btn-depositok" showSpan('alert-tixian')>
              </li>
            </ul>
          </div>




    <div class="alert-450" id="alert-tixian" style="display:none;">
      <div class="alert-title">

        <span class="alert-close" id="alert-close" onclick="displaySpan('alert-tixian')"></span></div>
      <div class="alert-main" id="alert-main">
        <form id="changeEmailForm" name="changeEmailForm" method="post" action="/user/managemyInfo" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="changeEmailForm" value="changeEmailForm">
          <ul>

            <li style="margin-left:-100px;" >
              <label class="txt-name"></label>
        <div style="width:560px;margin-left:-100px;" id="ti"></div>
             
              <script>
      $('#alert-close').click(function(){
        $('#alert-tixian').attr('style','display:none')

      })  
              </script>
    
              <div id="changeEmailFormauthCodeErrorDiv" class="errorplace"></div>

              <div id="authCodeMsg6" style="display:none;" class="yzmplace1"> <span id="mobileMsg6"></span> </div>
             
            </li>
          </ul>
          <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="6247899183375709698:8256389782682127070" autocomplete="off">
        </form>
      </div>
      <div class="alert-main" id="alert-main2" style="display:none;text-align:center;">
        <div class="about-con">
          <ul>
            <li> <br>
              
            <li>
              <input type="submit" name="j_idt153" value="确认" style="margin:20px 0 20px 80px;" class="btn-ok txt-right2" onclick="displaySpan2()">
            </li>
          </ul>
        </div>
      </div>
    </div>






        <div class="deposit-tip"> 温馨提示：<br>
          1、用户需在完成身份认证、开通丰付托管账户并绑定银行卡后，方可申请提现；<br>
          2、请务必在提现时使用持卡人与身份认证一致的银行卡号，且确保填写信息准确无误；<br>
          3、工作日当天16:00前提交的提现申请将在当天处理，默认为T+1到账；<br>
          4、提现金额单笔上限为50万元，单日累计总额不可超过100万元；<br>
          5、提现手续费为提现金额的0.1%，最低每笔2元，100元封顶，手续费由第三方托管账户收取，用户自行承担。<br>
        </div>
      </div>
    </div>
    <script type="text/javascript">
             $('#cash').keyup(function () {
                     var cash=$(this).val();
                 if(parseInt(100)>parseInt(cash)){
                 }else{
                     var new_formalities=cash*0.01;
                     var new_cash=cash-new_formalities;
                     $('#formalities').html(new_formalities);
                     $('#new_cash').html(new_cash)
                 }
             })
			$("#form\\:actualMoney").focus(
					   function(){
						   	    $(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial","border":"1px solid #0caffe"});
						   if($("#form\\:actualMoney").val() == value) {
							   	$("#form\\:actualMoney").val("")
								$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial"});
						   }
						}).blur(
						function(){
						        $(this).css("border","1px solid #D0D0D0");
						        if($("#form\\:actualMoney").val() == "") {
							  	$(this).css({"color":"#D0D0D0","font-size":"14px","font-weight":"normal"});
					}
				})

				function keyUpcheck()
				{
					$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial"});
				}
			</script>
    <div class="clear"></div>
  </div>
</div>
<!--网站底部-->
<?php include('layouts/foot.php') ?>
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>
</body>
</html>
  <script type="text/javascript">
     $( function () {
         var sm={
             'kong':0,
             'xiao':0,
             'da':0,
             'sum':0
         };
          $('#cash').blur(function () {
              var cash=$(this).val()
              var ke=$('.ke').attr('ke')
              var actualMessage=$("#actualMoney_message");
              var patt = new RegExp(/^(?!0+$)(?!0*\.0*$)\d{1,8}(\.\d{1,2})?$/); //注意是非全局匹配
              var ret_test = patt.test(cash);
              if(cash==""){
                  sm.kong=0
                  actualMessage.html("请输入金额");
                  actualMessage.attr('style',"")
              }else{
                  sm.kong=1
                  actualMessage.attr('style','display:none')
                  if(parseInt(cash)>parseInt(ke)){
                      sm.da=0
                      actualMessage.html("余额不足");
                      actualMessage.attr('style',"")
                  }else{
                      sm.da=1
                      actualMessage.attr('style','display:none')
                      if(parseInt(100)>parseInt(cash)){
                          sm.xiao=0
                          actualMessage.html("最少提现100");
                          actualMessage.attr('style',"")
                      }else{
                          sm.xiao=1
                          if(ret_test){
                              actualMessage.attr('style',"display:none")
                              sm.sum=1
                          }else{
                              sm.sum=0
                              actualMessage.html("小数点最多两位");
                              actualMessage.attr('style',"")
                          }
                      }
                  }
              }
          })
         $('.btn-depositok').click(function () {
           if(sm.kong==1 && sm.da==1 && sm.sum==1 && sm.xiao==1){
            <?php if($pay_pass == 0){ ?>
                    art.dialog({
                      title: '请先设置支付密码',
                      content: '<div class="">为了保障您的账户安全及权益，请您去个人中心设置您的支付密码哦，亲~~~。</div>',
                      resize:false,//可拉伸弹出框开关
                      fixed:true,
                      lock:true,//锁屏
                      opacity:.7,//锁屏背景透明度
                      background:'#000',//锁屏背景颜色
                      drag:false,//拖动开关
                      width:550,
                      height:150,
                      okVal: "立即去设置",
                      ok: function(){
                        window.location.href= "Account";
                      }
                    }); 
            <?php } ?>
            <?php if($pay_pass == 1){ ?>
                      
                          art.dialog({
                            title: '请输入支付密码',
                            content: '<div class="content" style="margin-top:-50px;"><div class="title">支付宝支付密码：</div><div class="box"></div><div class="forget"><a href="Account">忘记密码？</a></div><div class="point">请输入6位数字密码</div><p id="pay_tbox"></p><a href="javascript:void(0);"><button class="getPasswordBtn">确认支付</button></a><div class="errorPoint">请输入数字！</div></div>',
                            resize:false,//可拉伸弹出框开关
                            fixed:true,
                            lock:true,//锁屏
                            opacity:.7,//锁屏背景透明度
                            background:'#000',//锁屏背景颜色
                            drag:false,//拖动开关
                            width:550,
                            height:150,
                          });
                          /*动态生成*/
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
                            var token=$('.token').val();
                            var user_card=$('#deposite-txt').val();
                            var cash=$('#cash').val()
                            var user_assets=$('#user_assets').val();

                    
                            
                            $.ajax({
                                type:'post',
                                async: false,
                                data:{user_card:user_card,cash:cash,user_assets:user_assets,_token:token,pay_pass:n},
                                url:'cash',
                                success:function(data){

                                    if(data==1){
                                          art.dialog({
                                              title: '提现成功',
                                              content: '<img src="home/images/icon7.gif" alt=""><span>恭喜您提现成功，提现金额'+Math.floor(cash/1*0.99*100)/100+'，提现金额将于两小时内到达您的银行账户，请注意查收！</span>',
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
                                                window.location.reload()
                                              
                                              }
                                            });

                                    }else if(data==3){

                                      $('#pay_tbox').html('<font color="red">请输入正确的支付密码</font>')

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
             

      
            <?php } ?>
                 

             }

         })
      })


    </script>
