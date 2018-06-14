<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="home/css/common.css" rel="stylesheet" />
<link href="home/css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="home/script/jquery.min.js"></script>
<script type="text/javascript" src="home/script/common.js"></script>
<style>
/*客服样式*/
 *{ margin:0; padding:0; list-style:none;}
    img{ border:0;}

    .rides-cs {  font-size: 12px; background:#29a7e2; position: fixed; top: 250px; right: 0px; _position: absolute; z-index: 1500; border-radius:6px 0px 0 6px;}
    .rides-cs a { color: #00A0E9;}
    .rides-cs a:hover { color: #ff8100; text-decoration: none;}
    .rides-cs .floatL { width: 36px; float:left; position: relative; z-index:1;margin-top: 21px;height: 181px;}
    .rides-cs .floatL a { font-size:0; text-indent: -999em; display: block;}
    .rides-cs .floatR { width: 130px; float: left; padding: 5px; overflow:hidden;}
    .rides-cs .floatR .cn {background:#F7F7F7; border-radius:6px;margin-top:4px;}
    .rides-cs .cn .titZx{ font-size: 14px; color: #333;font-weight:600; line-height:24px;padding:5px;text-align:center;}
    .rides-cs .cn ul {padding:0px;}
    .rides-cs .cn ul li { line-height: 38px; height:38px;border-bottom: solid 1px #E6E4E4;overflow: hidden;text-align:center;}
    .rides-cs .cn ul li span { color: #777;}
    .rides-cs .cn ul li a{color: #777;}
    .rides-cs .cn ul li img { vertical-align: middle;}
    .rides-cs .btnOpen, .rides-cs .btnCtn {  position: relative; z-index:9; top:25px; left: 0;  background-image: url(http://demo.lanrenzhijia.com/2014/service1031/images/lanrenzhijia.png); background-repeat: no-repeat; display:block;  height: 146px; padding: 8px;}
    .rides-cs .btnOpen { background-position: 0 0;}
    .rides-cs .btnCtn { background-position: -37px 0;}
    .rides-cs ul li.top { border-bottom: solid #ACE5F9 1px;}
    .rides-cs ul li.bot { border-bottom: none;}






/*上下滚动*/
#scrollDiv {
	width: 400px;
	height: 30px;
	line-height: 30px;
	overflow: hidden;
}
#scrollDiv li {
	height: 30px;
	padding-left: 10px;
}




</style>
<script type="text/javascript">
// 上下滚动
function AutoScroll(obj) {
    $(obj).find("ul:first").animate({
        marginTop: "-25px"
    },
    500,
    function() {
        $(this).css({
            marginTop: "0px"
        }).find("li:first").appendTo(this);
    });
}
$(document).ready(function() {
    var myar = setInterval('AutoScroll("#scrollDiv")', 3000);
    $("#scrollDiv").hover(function() {
        clearInterval(myar);
    },
    function() {
        myar = setInterval('AutoScroll("#scrollDiv")', 3000)
    }); //当鼠标放上去的时候，滚动停止，鼠标离开的时候滚动开始
});


</script>
</head>
<body>
<?php
include('layouts/header.blade.php');
?>
<!--banner-->
<div class="flexslider">

<!-- 客服开始 -->
 <div id="floatTools" class="rides-cs" style="height:246px;">
        <div class="floatL">
            <a id="aFloatTools_Show" class="btnOpen" title="查看在线客服" style="top:20px;display:block" href="javascript:void(0);">展开</a>
            <a id="aFloatTools_Hide" class="btnCtn" title="关闭在线客服" style="top:20px;display:none" href="javascript:void(0);">收缩</a>
        </div>
        <div id="divFloatToolsView" class="floatR" style="display: none;height:237px;width: 140px;">
            <div class="cn">
                <h3 class="titZx">二十二世纪金融在线客服</h3>
                <ul>
                    <li><span>客服1</span> <a  href=tencent://message/?uin=878020434&Site=工具啦&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:878020434:1 alt="点击这里给我发消息"></a>
                    <li><span>客服2</span> <a  href=tencent://message/?uin=947280924&Site=工具啦&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:947280924:1 alt="点击这里给我发消息"></a> 
                    <li><span>客服3</span><a   href=tencent://message/?uin=2043063427&Site=工具啦&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:2043063427:1 alt="点击这里给我发消息"></a>
                    <li>
                        <a href="JavaScript:;" target="_blank">电话：</a>
                        <a href="javascript:;" target="_blank">666-1438</a>
                        <div class="div_clear"></div>
                  
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $("#aFloatTools_Show").click(function(){
                $('#divFloatToolsView').animate({width:'show',opacity:'show'},100,function(){$('#divFloatToolsView').show();});
                $('#aFloatTools_Show').hide();
                $('#aFloatTools_Hide').show();
            });
            $("#aFloatTools_Hide").click(function(){
                $('#divFloatToolsView').animate({width:'hide', opacity:'hide'},100,function(){$('#divFloatToolsView').hide();});
                $('#aFloatTools_Show').show();
                $('#aFloatTools_Hide').hide();
            });
        });
    </script>



<!-- 客服结束 -->
  <ul class="slides">
  <?php foreach($slide as $k=>$v ){  ?>
    <li style="background-image: url(<?php echo $v->img ?>); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-position: 50% 0px; background-repeat: no-repeat no-repeat;" class=""><a href="#" target="_blank"></a></li>
   <?php } ?>
  </ul>
</div>
<script src="home/script/jquery.flexslider-min.js"></script>
<script>
$(function(){
    $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
    });
    //产品列表滚动
    var pLength = $('.pListContentBox > li').length;
    var cishu = pLength-4;
    var n = 0;
    $('.pListContentBox').css({'width':pLength*245+'px'});
    if(pLength>4){
        $('.pListRight').addClass('curr');
    }
    $('.pListRight').on('click',function(){
        if(cishu>0){
            //alert('1');
            n++;
            cishu--;
            $('.pListContentBox').animate({'left':'-'+n*244+'px'},500);
            if(cishu==0){
                $('.pListRight').removeClass('curr');
            }
            if(n>0){
                $('.pListLeft').addClass('curr');
            }
        }
    });
    $('.pListLeft').on('click',function(){
        if(n>0){
            n--;
            cishu++;
            $('.pListContentBox').animate({'left':'-'+n*244+'px'},500);
            if(n==0){
                $('.pListLeft').removeClass('curr');
            }
            if(cishu>0){
                $('.pListRight').addClass('curr');
            }
        }
    });
    //alert(pLength);
});
</script>

<!--注册登陆模块-->
<div class="login_float">
  <div class="index_login">
    <div class="login_name">22世纪金融年化收益率</div>
    <div class="login_num">8<font>%</font>~15<font>%</font></div>
    <div class="login_info"> <span class="login_info1"><font>3~4倍</font>定期存款收益</span> <span class="login_info2"><font>30倍</font>活期存款收益</span> </div>
    <div class="clear"></div>
    <div class="login_btn">

         <?php if(empty(session('user_id'))){ ?>

          <a href="register">立即注册</a>
            <?php } else{ ?>
             <a href="ucenter">进入我的账号</a>  
            <?php  }?>
   </div>
  	 
         <?php if(empty(session('user_id'))){ ?>
    <p class="login_reg">已有账号，<a href="login">立即登录</a></p>
	
            <?php  }?>
  </div>
</div>


<script type="text/javascript">
var gaintop;
$(function(){
	gaintop = $(".login_float").css("top");
	$(".login_float").css("top",-695);
	$(".login_float").show();
	$(".login_float").animate({top: gaintop,opacity:1},800);
    $(".login_float").animate({top: '-=12px',opacity:1},200);
    $(".login_float").animate({top: gaintop,opacity:1},200);
    $(".login_float").animate({top: '-=6px',opacity:1},200);
    $(".login_float").animate({top: gaintop,opacity:1},200);
    $(".login_float").animate({top: '-=2px',opacity:1},100);
    $(".login_float").animate({top: gaintop,opacity:1},100);
});

</script>
<div class="new-announcement">
  <div class="new-announcement-title">最新公告</div>
  <div class="new-announcement-content">
    <div id="scrollDiv">
      <ul style="margin-top: 0px;">
	
         <?php foreach($user_grow_ranking as $k=>$v){ ?>
        <li><a class="black-link" href="javascript:;"><?php echo @$v->user_name  ?>投标收益￥<?php echo @$v->total_grow  ?></a></li>
	<?php } ?>
      </ul>
    </div>
  </div>
  <a class="more" href="#">更多</a> </div>
<div class="ipubs"><span class="o1">累计投资金额:<strong><?=$list['total_money']?></strong>元</span> <span class="o2">已还本息:<strong><?=$list['liquid_assets']?></strong>元</span><span class="o2">余额:<strong><?=$list['user_assets']?></strong>元</span><span class="o4">注册人数:<strong><?=$list['user_num']?></strong>人</span></div>
<div class="feature"> <a class="fea1" href="#"> <i></i>
  <h3>高收益</h3>
  <span>年化收益率最高达“20%<br>
  50元起投，助您轻松获收益</span> </a> <a class="fea2" href="#"> <i></i>
  <h3>安全理财</h3>
  <span>100%本息保障<br>
  实物质押，多重风控审核</span> </a> <a class="fea3" href="#"> <i></i>
  <h3>随时赎回</h3>
  <span>两步赎回您的资金<br>
  最快当日到账</span> </a> <a class="fea4" href="#"> <i></i>
  <h3>随时随地理财</h3>
  <span>下载手机客户端<br>
  随时随地轻松理财</span> </a> </div>
<!--中间内容-->
<div class="main clearfix mrt30" data-target="sideMenu">
  <div class="wrap">
    <div class="page-left fn-left">



<?php foreach($cate_tree as $k=>$v){ ?>
      <div class="mod-borrow">
        <div class="hd">
          <h2 class="pngbg"><i class="icon icon-ttyx"></i><?php echo $k ?></h2>
          <div class="fn-right f14 c-888">常规发标时间每天<span class="c-555">10:00，13:00和20:00</span>，其余时间根据需要随机发</div>
        </div>
        <div class="bd">
          <div class="des"><span class="fn-left">期限1-29天，期限短，收益见效快</span><a href="home_loan_list" class="fn-right">查看更多&gt;&gt;</a></div>
          <div class="borrow-list">
            <ul>
            <?php foreach($v as $m=>$n){ ?>
              <li>
                <div class="title"><a href="JavaScript:void(0);" target="_blank"><i class="icon icon-zhai" title="债权贷"></i></a><a href="infor.html" class="f18" title="<?php echo $n->title.'借款'.$n->total_money.'元'; ?>" target="_blank"><?php echo $n->title.'借款'.$n->total_money.'元'; ?></a></div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="260">借款金额<span class="f24 c-333"><?php echo $n->total_money ?></span>元</td>
                      <td width="165">年利率<span class="f24 c-333"><?php echo $n->rate ?>% </span></td>
                      <td width="180" align="center">期限<span class="f24 c-orange"><?php echo $n->term ?></span>个月</td>
                      <td><div class="circle">
                          <div class="left progress-bar">
                            <div class="progress-bgPic progress-bfb<?php echo sprintf('%.0f',$n->real_money/$n->total_money*10) ?>">
                              <div class="show-bar"> <?php echo sprintf('%.2f',$n->real_money/$n->total_money*100) ?>% </div>
                            </div>
                          </div>
                        </div></td>
                      <td align="right"><a class="ui-btn btn-gray" opt="<?php echo $n->real_money/$n->total_money ?>" href="item_info?product_id=<?php echo $n->product_id; ?>">还款中</a></td>
                    </tr>
                  </tbody>
                </table>
              </li>
            <?php }?>
            </ul>
          </div>
        </div>
      </div>
  <?php } ?>
   
<script>
$('.btn-gray').each(function(k,v){

  if($(this).attr('opt')=='1'){
      $(this).text('已满标')
  }

})

</script>


   
    </div>
    <div class="page-right fn-right" style="top: 0px;">
      <div class="mod-risk-tip">
      	<a href="/bxbz/index.html" class="c-orange"><a  href=tencent://message/?uin=878020434&Site=工具啦&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:878020434:13 alt="点击这里给我发消息"></a><a  href=tencent://message/?uin=947280924&Site=工具啦&Menu=yes><img border="0" SRC=http://wpa.qq.com/pa?p=1:947280924:13 alt="点击这里给我发消息"></a></a>


      </div>
      <div class="mod mod-notice mrt20">
        <div class="hd">
          <h3>网站公告</h3>
          <a href="/gonggao/news/index.html" class="fn-right"></a></div>
        <div class="bd">
          <div class="article-list clearfix">
            <ul>
              <li><a href="#" title="关于“金融产品”产品的说明">关于“金融产品”产品的说明</a><span class="date">06-19</span></li>
              <li><a href="#" title="2015年9月10日发标预告">2015年9月10日发标预告</a><span class="date">09-10</span></li>
              <li><a href="#" title="关于平台“纪念抗战胜利70周年”9月3日***">关于平台“纪念抗战胜利70周年***</a><span class="date">09-02</span></li>
              <li><a href="#" title="关于P2P理财平台新系统升级的公告">关于P2P理财平台新系统***</a><span class="date">09-02</span></li>
              <li><a href="#" title="关于债权贷新规调整实施的公告">关于债权贷新规调整实施的公告</a><span class="date">08-25</span></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mod mod-rank clearfix ui-tab mrt20">
        <div class="hd">
          <h3>排行榜</h3>
          <div class="ui-tab-nav"> <i class="icon icon-cur"></i>
            <ul>
              <li class="active"><a href="#">收益</a></li>
              <li><a href="#">投资</a></li>
            </ul>
            <a href="#" class="fn-right"></a> </div>
        </div>
        <div class="bd">
          <div class="ui-tab-cont">
            <div class="ui-tab-item active">
              <ul class="rank-list">
              <?php foreach($user_grow_ranking as $k=>$v){ ?>
                <li><span class="f<?=$k+1;?>"><em class="n<?=$k+1;?>">0<?=$k+1;?></em><?= substr_replace($v->user_name,'*****',3); ?></span><span class="fr">￥<?php echo $v->total_grow; ?></span></li>
                <?php } ?>
              </ul>
            </div>
            <div class="ui-tab-item">
              <ul class="rank-list">
              <?php foreach($user_pro_ranking as $k=>$v){ ?>
                <li><span class="f<?=$k+1;?>"><em class="n<?=$k+1;?>">0<?=$k+1;?></em><?= substr_replace($v['user_name'],'*****',3); ?></span><span class="fr">￥<?php echo $v['total_money']; ?></span></li>
               <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="mod mod-report ui-tab clearfix mrt20">
        <div class="hd">
          <div class="ui-tab-nav"> <i class="icon icon-cur"></i>
            <ul>
              <li class="active"><a href="javascript:;">媒体报道</a></li>
              <li class=""><a href="javascript:;">理财知识</a></li>
            </ul>
          </div>
        </div>
        <div class="bd">
          <div class="ui-tab-cont">
            <div class="ui-tab-item active">

              <div class="article-list">
                <ul>
                <?php foreach($news as $k=>$v){ ?>
                  <li>[网贷之家]<a href="<?php echo $v->news_link;?>" title="<?php echo $v->news_title;?>" target="_blank"><?php echo $v->news_title;?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <div class="ui-tab-item">
              <div class="article-list">
                <ul>
                  <?php foreach($licai as $k=>$v){ ?>
                  <li>[<a href="#">P2P网贷</a>]<a href="<?php echo $v->news_link;?>" title="<?php echo $v->news_title;?>" target="_blank"><?php echo $v->news_title;?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mrt20 mod"> <a href="calculator"><img src="home/images/pic_home_js.jpg" width="300" height="80" alt="收益计算器" class="pic"></a></div>
    </div>
  </div>
</div>
<script src="home/script/index.js"></script>
<div class="partners wrap clearfix mrb30">
  <div class="partners-inner ui-tab">
    <div class="hd">
      <div class="ui-tab-nav"> <i class="icon icon-cur" style="left: 151px;"></i>
        <ul>
          <li class=""><a href="#">合作机构</a></li>
          <li class="active"><a href="#">友情链接</a></li>
        </ul>
      </div>
    </div>
    <div class="bd">
      <div class="ui-tab-cont">
        <div class="ui-tab-item active">
          <div class="img-scroll">
            <div class="container">
              <ul>
                <li><img src="home/images/logo_sbcvc.png" width="152" height="52" alt="软银"></li>
                <li><img src="home/images/logo_abc.png" width="152" height="52" alt="农业银行"></li>
                <li><img src="home/images/logo_wdzj.png" width="152" height="52" alt="网贷之家"></li>
                <li><img src="home/images/logo_baidu.png" width="152" height="52" alt="百度"></li>
                <li><img src="home/images/logo_aqb.png" width="152" height="52" alt="安全宝"></li>
                <li><img src="home/images/logo_gds.png" width="152" height="52" alt="万国数据"></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="ui-tab-item">
          <div class="links"> <a target="_blank" href="http://www.htmlsucai.com">网贷互联</a> <a target="_blank" href="http://www.htmlsucai.com">北京证券网</a> <a target="_blank" href="http://www.htmlsucai.com">易贷微理财</a> <a target="_blank" href="http://www.htmlsucai.com">P2P</a> <a target="_blank" href="http://www.htmlsucai.com">网贷中国</a> <a target="_blank" href="http://www.htmlsucai.com">网贷帮手</a> <a target="_blank" href="https://www.okcoin.cn">比特币网</a> <a target="_blank" href="http://www.htmlsucai.com">网贷110</a> <a target="_blank" href="http://www.htmlsucai.com">招财猫理财</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('layouts/foot.php');
?>
</body>
</html>
