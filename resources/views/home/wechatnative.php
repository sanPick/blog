<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>微信支付</title>
</head>
<body>

<br/><br/><br/>
<center>
    <div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">充值的金额为￥<?php echo $money?></div><br/>
    <div style="margin-left: 10px;color:#556B2F;font-size:30px;font-weight: bolder;">微信扫描支付</div><br/>
    <img alt="模式二扫码支付" src="wechat/qrcode?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>
    <!-- 给用户的提示信息  -->
    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token()?>" />
    <br/>
    <br/>
    <br/>
    <br/>
    <div id="myDiv"></div>
</center>

</body>
</html>
<script>
    //同步实现页面的效果展示
    //设置每隔5000毫秒执行一次load() 方法
    var myIntval=setInterval('load()',3000);
    var _token  = document.getElementById('_token').value;
    function load(){

        //document.getElementById("timer").innerHTML=parseInt(document.getElementById("timer").innerHTML)+1;
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                //订单响应信息
                result=JSON.parse(xmlhttp.responseText);
                //alert(trade_state);
                //alert(trade_state);
                if(result.trade_state=='SUCCESS')
                {
                    document.getElementById("myDiv").innerHTML='支付成功';
                    //alert(transaction_id);
                    //延迟3000毫秒执行tz() 方法
                    clearInterval(myIntval);
                    setTimeout("location.href = 'recharge'",3000);

                }
                else if(result.trade_state=='REFUND')
                {
                    document.getElementById("myDiv").innerHTML='转入退款';
                    clearInterval(myIntval);
                }
                else if(result.trade_state=='NOTPAY')
                {
                    document.getElementById("myDiv").innerHTML='请扫码支付';

                }
                else if(result.trade_state=='CLOSED')
                {
                    document.getElementById("myDiv").innerHTML='已关闭';
                    clearInterval(myIntval);
                }
                else if(result.trade_state=='REVOKED')
                {
                    document.getElementById("myDiv").innerHTML='已撤销';
                    clearInterval(myIntval);
                }
                else if(result.trade_state=='USERPAYING')
                {
                    document.getElementById("myDiv").innerHTML='用户支付中';
                }
                else if(result.trade_state=='PAYERROR')
                {
                    document.getElementById("myDiv").innerHTML='支付失败';
                    clearInterval(myIntval);
                }

            }
        };
        //orderquery.php 文件返回订单状态，通过订单状态确定支付状态
        xmlhttp.open("POST","wechat/queryorder",false);
        //下面这句话必须有
        //把标签/值对添加到要发送的头文件。
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("out_trade_no=<?php echo $order_id;?>&_token="+_token);

    }
</script>