<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="home/css/user.css" />
<link href="home/css/register.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="home/css/jquery.datetimepicker.css"/>
<link href="home/css/base.css" rel="stylesheet">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<script src="home/script/user.js" type="text/javascript"></script>
<script src="home/js/jquery-1.js" type="text/javascript"></script>
<link href="home/css/zhuanpan.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="home/js/awardRotate.js"></script>

<script type="text/javascript">
var turnplate={
		restaraunts:[],				//大转盘奖品名称
		colors:[],					//大转盘奖品区块对应背景颜色
		outsideRadius:192,			//大转盘外圆的半径
		textRadius:155,				//大转盘奖品位置距离圆心的距离
		insideRadius:68,			//大转盘内圆的半径
		startAngle:0,				//开始角度
		
		bRotate:false				//false:停止;ture:旋转
};

$(document).ready(function(){
	//动态添加大转盘的奖品与奖品区域背景颜色
	turnplate.restaraunts = [<?php echo $new_str ?>];
	turnplate.colors = ["#FFF4D6", "#FFFFFF", "#FFF4D6", "#FFFFFF","#FFF4D6", "#FFFFFF", "#FFF4D6", "#FFFFFF","#FFF4D6", "#FFFFFF"];

	
	var rotateTimeOut = function (){
		$('#wheelcanvas').rotate({
			angle:0,
			animateTo:2160,
			duration:8000,
			callback:function (){
				alert('网络超时，请检查您的网络设置！');
			}
		});
	};

	//旋转转盘 item:奖品位置; txt：提示语;
	var rotateFn = function (item, txt){
		var angles = item * (360 / turnplate.restaraunts.length) - (360 / (turnplate.restaraunts.length*2));
		if(angles<270){
			angles = 270 - angles; 
		}else{
			angles = 360 - angles + 270;
		}
		$('#wheelcanvas').stopRotate();
		$('#wheelcanvas').rotate({
			angle:0,
			animateTo:angles+1800,
			duration:8000,
			callback:function (){
                    var user_id = '<?php echo session("user_id") ?>'
                    var trun_name = txt
                    var _token = '<?php echo csrf_token() ?>'
                    $.ajax({
                        type:'post',
                        url:'turn',
                        data:{user_id:user_id,trun_name:trun_name,_token:_token},
                        dataType:'json',
                        success:function(msg){
                              if(txt == '谢谢参与'){
                                    art.dialog({
                                        title: '谢谢参与',
                                        content: '亲爱的用户，下次继续努力',
                                        resize:true,//可拉伸弹出框开关
                                        fixed:true,
                                        lock:true,//锁屏
                                        opacity:.7,//锁屏背景透明度
                                        background:'#000',//锁屏背景颜色
                                        drag:false,//拖动开关
                                        width:350,
                                        height:50,
                                        okVal: "确认",
                                        ok: function(){

                                            
                                        }
                                    });
                                    return false
                                }
                                if(msg.msg == 2){
                                	var title = '提示'
                                	var conts = '您今天已经领取，请明天再来'
                                }else if(msg.msg==1){
                                	var title = '恭喜你'
                                	var conts = '获得'+txt+'，红包兑换码：'+msg.code+'，请复制后前往兑换红包'                               	
                                }else if(msg.msg==3){
                                	var title = '恭喜你'
                                	var conts = '获得'+txt+'，可用于兑换红包'                                	
                                }else if(msg.msg == 0){
                                	var title = '提示'
                                	var conts = '亲，发现未知错误，我也很绝望啊~~'    
                                }

                                    art.dialog({
                                        title: title,
                                        content: conts,
                                        resize:true,//可拉伸弹出框开关
                                        fixed:true,
                                        lock:true,//锁屏
                                        opacity:.7,//锁屏背景透明度
                                        background:'#000',//锁屏背景颜色
                                        drag:false,//拖动开关
                                        width:350,
                                        height:50,
                                        okVal: "确认",
                                        ok: function(){
                                        	window.location.reload();
                                            
                                        }

                    			})

                        }

                    })


				turnplate.bRotate = !turnplate.bRotate;
			}
		});
	};

	$('.pointer').click(function (){
		if(turnplate.bRotate)return;
		turnplate.bRotate = !turnplate.bRotate;
		//获取随机数(奖品个数范围内)
		var item = rnd(1,turnplate.restaraunts.length);
		//奖品数量等于10,指针落在对应奖品区域的中心角度[252, 216, 180, 144, 108, 72, 36, 360, 324, 288]
		rotateFn(item, turnplate.restaraunts[item-1]);
		/* switch (item) {
			case 1:
				rotateFn(252, turnplate.restaraunts[0]);
				break;
			case 2:
				rotateFn(216, turnplate.restaraunts[1]);
				break;
			case 3:
				rotateFn(180, turnplate.restaraunts[2]);
				break;
			case 4:
				rotateFn(144, turnplate.restaraunts[3]);
				break;
			case 5:
				rotateFn(108, turnplate.restaraunts[4]);
				break;
			case 6:
				rotateFn(72, turnplate.restaraunts[5]);
				break;
			case 7:
				rotateFn(36, turnplate.restaraunts[6]);
				break;
			case 8:
				rotateFn(360, turnplate.restaraunts[7]);
				break;
			case 9:
				rotateFn(324, turnplate.restaraunts[8]);
				break;
			case 10:
				rotateFn(288, turnplate.restaraunts[9]);
				break;
		} */
		console.log(item);
	});
});

function rnd(n, m){
	var random = Math.floor(Math.random()*(m-n+1)+n);
	return random;
	
}


//页面所有元素加载完毕后执行drawRouletteWheel()方法对转盘进行渲染
window.onload=function(){
	drawRouletteWheel();
};

function drawRouletteWheel() {    
  var canvas = document.getElementById("wheelcanvas");    
  if (canvas.getContext) {
	  //根据奖品个数计算圆周角度
	  var arc = Math.PI / (turnplate.restaraunts.length/2);
	  var ctx = canvas.getContext("2d");
	  //在给定矩形内清空一个矩形
	  ctx.clearRect(0,0,422,422);
	  //strokeStyle 属性设置或返回用于笔触的颜色、渐变或模式  
	  ctx.strokeStyle = "#FFBE04";
	  //font 属性设置或返回画布上文本内容的当前字体属性
	  ctx.font = '16px Microsoft YaHei';      
	  for(var i = 0; i < turnplate.restaraunts.length; i++) {       
		  var angle = turnplate.startAngle + i * arc;
		  ctx.fillStyle = turnplate.colors[i];
		  ctx.beginPath();
		  //arc(x,y,r,起始角,结束角,绘制方向) 方法创建弧/曲线（用于创建圆或部分圆）    
		  ctx.arc(211, 211, turnplate.outsideRadius, angle, angle + arc, false);    
		  ctx.arc(211, 211, turnplate.insideRadius, angle + arc, angle, true);
		  ctx.stroke();  
		  ctx.fill();
		  //锁画布(为了保存之前的画布状态)
		  ctx.save();   
		  
		  //----绘制奖品开始----
		  ctx.fillStyle = "#E5302F";
		  var text = turnplate.restaraunts[i];
		  var line_height = 17;
		  //translate方法重新映射画布上的 (0,0) 位置
		  ctx.translate(211 + Math.cos(angle + arc / 2) * turnplate.textRadius, 211 + Math.sin(angle + arc / 2) * turnplate.textRadius);
		  
		  //rotate方法旋转当前的绘图
		  ctx.rotate(angle + arc / 2 + Math.PI / 2);
		  
		  /** 下面代码根据奖品类型、奖品名称长度渲染不同效果，如字体、颜色、图片效果。(具体根据实际情况改变) **/
		  if(text.indexOf("M")>0){//流量包
			  var texts = text.split("M");
			  for(var j = 0; j<texts.length; j++){
				  ctx.font = j == 0?'bold 20px Microsoft YaHei':'16px Microsoft YaHei';
				  if(j == 0){
					  ctx.fillText(texts[j]+"M", -ctx.measureText(texts[j]+"M").width / 2, j * line_height);
				  }else{
					  ctx.fillText(texts[j], -ctx.measureText(texts[j]).width / 2, j * line_height);
				  }
			  }
		  }else if(text.indexOf("M") == -1 && text.length>6){//奖品名称长度超过一定范围 
			  text = text.substring(0,6)+"||"+text.substring(6);
			  var texts = text.split("||");
			  for(var j = 0; j<texts.length; j++){
				  ctx.fillText(texts[j], -ctx.measureText(texts[j]).width / 2, j * line_height);
			  }
		  }else{
			  //在画布上绘制填色的文本。文本的默认颜色是黑色
			  //measureText()方法返回包含一个对象，该对象包含以像素计的指定字体宽度
			  ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
		  }
		  
		  //添加对应图标
		  if(text.indexOf("闪币")>0){
			  var img= document.getElementById("shan-img");
			  img.onload=function(){  
				  ctx.drawImage(img,-15,10);      
			  }; 
			  ctx.drawImage(img,-15,10);  
		  }else if(text.indexOf("谢谢参与")>=0){
			  var img= document.getElementById("sorry-img");
			  img.onload=function(){  
				  ctx.drawImage(img,-15,10);      
			  };  
			  ctx.drawImage(img,-15,10);  
		  }
		  //把当前画布返回（调整）到上一个save()状态之前 
		  ctx.restore();
		  //----绘制奖品结束----
	  }     
  } 
}

</script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><a href="binding"><img src="home/images/clist1.jpg" width="1200" height="96"></a></div>
      <?php include('layouts/user_ucenter.php') ?>
    <label id="typeValue" style="display:none;"> </label>
    <div class="personal-main">
      <div class="personal-deposit">
          <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}" >
    <img src="home/images/1.png" id="shan-img" style="display:none;" />
    <img src="home/images/2.png" id="sorry-img" style="display:none;" />
	<div class="banner">
		<div class="turnplate" style="background-size:30% 30%;width:50%;height:50%">
			<canvas class="item" id="wheelcanvas" width="422px" height="422px">
			</canvas>
			<img class="pointer"  src="home/images/turnplate-pointer.png"/>
		</div>
	</div>

	<div style="display:none">
	<script type="text/javascript">
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F6f798e51a1cd93937ee8293eece39b1a' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5718743'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s9.cnzz.com/stat.php%3Fid%3D5718743%26show%3Dpic2' type='text/javascript'%3E%3C/script%3E"));</script>
	</div>
</div>
<div class="investnote-list">
            <div class="investnote-contitle"> <span class="investnote-w1 fb">时间</span> <span class="investnote-w2 fb">姓名</span> <span class="investnote-w2 fb">获奖</span>    </div>

             <ul>
             @foreach($u_t as $k=>$v)
               <li><span class="investnote-w1">{{date('Y-m-d',$v->add_time)}}</span><span class="investnote-w2">{{substr_replace($v->user_name,'****',3)}}</span><span class="investnote-w2">{{$v->trun_name}}</span> </li>
               @endforeach
        
                                      </ul>
            
          </div>

      </div>
    
    </div>
    <div class="clear">
   
    
    </div>
  </div>
</div>
<?php
include('layouts/foot.php');
?>

</body>
</html>
<link href="home/css/yrd-dialog.css" rel="stylesheet">
<script src="home/js/jquery-2.js" type="text/javascript"></script>


