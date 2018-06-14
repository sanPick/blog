
<div id="personal-left" class="personal-left" style="">
      <ul>
        <li><span><a href="ucenter"><i class="dot dot1"></i>账户总览</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="user_bids">个人信誉</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="fund">资金记录</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="repayment">还款计划</a></span></li>
        <li class=""><span><a href="user_pawn"><i class="dot dot02"></i>我要借款</a> </span> </li>
        <li><span><a href="recharge"><i class="dot dot03"></i>充值</a></span></li>
          <!--<li><span><a href="recharge_list"><i class="dot dot03"></i>充值记录</a></span></li>-->
        <li class=""><span><a href="cash"><i class="dot dot04"></i>提现</a></span></li>
        <li style="position:relative;" class=""> <span> <a href="my_red_packets"> <i class="dot dot06"></i> 我的红包 </a> </span></li>
        <li class=""><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="red_packets_exchange">兑换历史</a></span></li>
        <li style="position:relative;"> <span> <a href="binding"><i class="dot dot08"></i>绑定银行卡 </a> </span> </li>
        <li><span><a href="Account"><i class="dot dot09"></i>账户设置</a></span></li>
        <li><span><a href="invite"><i class="dot dot09"></i>邀请注册 </a></span></li>
        <li><span><a href="turn"><i class="dot dot09"></i>会员幸运抽奖 </a></span></li>

      </ul>
    </div>
<script>
    var _url = "<?php echo Request::path()?>";
//    alert(_url)
    $('#personal-left li a').each(function () {
        if ($(this).attr('href')== _url){
            $(this).parent().parent().addClass('pleft-cur');
        }
    });
    $(function(){
        //获取导航距离页面顶部的距离
        var toTopHeight = $("#personal-left").offset().top;
        var bottonHeight = $('#footer').offset().top;
        var H = $("#personal-left").outerHeight(true);
        //监听页面滚动
        $(window).scroll(function() {
            if($(document).scrollTop() >=  bottonHeight*1-H*1){
                $("#personal-left").removeClass("show");
            }
            //判断页面滚动超过左侧菜单栏 且没有超过footer
            if( $(document).scrollTop() > toTopHeight&&$(document).scrollTop()*1< bottonHeight*1-H*1){
//                alert(1)
                //检测是否为IE6。jQuery1.9中去掉了msie的方法，所以只好这样写
                if ('undefined' == typeof(document.body.style.maxHeight)) {
                    //页面滚动的距离
                    var scrollTop = $(document).scrollTop();
                    //IE6下，用absolute定位，并设置Top值为距离页面顶部的距离
                    $("#personal-left").css({'position':'absolute','top':scrollTop+'px'});
                }else{
                    //IE6以上浏览器采用fixed定位
                    $("#personal-left").addClass("show");
                }
            }else{//判断页面滚动没有超过导航时执行的代码
                if ('undefined' == typeof(document.body.style.maxHeight)) {
                    //设置Top值为导航距页面顶部的初始值。（IE6为了防止浏览器一下滚动过多，所以不能采用直接去掉定位的方法）
                    $("#personal-left").css({'position':'absolute','top':toTopHeight+'px'});
                }else{
                    //IE6以上浏览器移除fixed定位，采用默认流布局
                    $("#personal-left").removeClass("show");
                }
            }
        });
    });
</script>