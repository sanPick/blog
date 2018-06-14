<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <link href="css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/global.js"></script>
    <title>后台管理中心</title>
    <link rel="stylesheet" href="admin/css/pintuer.css">
    <link rel="stylesheet" href="admin/css/admin.css">
    <script src="admin/js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" /><?php use Symfony\Component\HttpFoundation\Session\Session;$session = new Session;
            echo $session->get("admin_name");?>　　后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="/" ><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="cache_clean" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="adm_logout"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<?php if($rote_id == 5){ 

    include('adminlayous/left.php');

 }else{
$nav_data = json_decode(file_get_contents('cache/nav.cache'),true);

?>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <?php foreach($nav_data as $key=>$v){ ?>

  <h2 class="h<?php echo $v['nev_id']; ?>"><span class="icon-user"></span><?php echo $v['nev_name']; ?></h2>
  <ul style="display:block" class="uls <?php echo $v['nev_id']; ?>" opt="<?php echo $v['nev_id']; ?>">
  <?php foreach($v['son'] as $m=>$n){ ?>
  <?php if(in_array( $n['nev_path'], $node_path)){ ?>
    <li><a href="<?= $n['nev_path']; ?>" target="right"><span class="icon-caret-right"></span><?= $n['nev_name']; ?></a></li>
  <?php } ?>
  <?php } ?>
 </ul>

   <?php } ?>

</div>
<?php } ?>
<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
$(function(){
    $('.uls').each(function(){

        if($('.'+$(this).attr('opt')).children().html()==undefined){
        $(this).parent().find('.h'+$(this).attr('opt')).remove()
        }


    })

})
</script>
<ul class="bread">
    <li><a href="info" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">





<div class="admin">
        <iframe scrolling="auto" rameborder="0" src="info" name="right" width="100%" height="100%"></iframe>
    </div>


</div>
<div style="text-align:center;">
    <p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>