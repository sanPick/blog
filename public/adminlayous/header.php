<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" /><?php use Symfony\Component\HttpFoundation\Session\Session;$session = new Session;
            echo $session->get("admin_name");?>　　后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="/" ><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="a_login"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>