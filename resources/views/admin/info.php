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
    <title></title>
    <link rel="stylesheet" href="admin/css/pintuer.css">
    <link rel="stylesheet" href="admin/css/admin.css">
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/pintuer.js"></script>
</head>
<style type="text/css">
    body{font-family: '楷体'; font-size: 14px;}

</style>
<body>
<div >



        <div id="index" class="mainBox" style="padding-top:18px;  width:1100px; height:auto!important;height:550px;min-height:550px;">


            <div id="douApi"></div>

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover text-center">
                <tr>
                    <td width="65%" valign="top" class="pr">
                        <div class="indexBox">
                            <div class="boxTitle">
                            <ul class="ipage"><a href="javascript:void(0);">网站基本信息</a></ul></div>
                            <ul>
                                <table width="100%" border="0" cellspacing="0" cellpadding="7" class="tableBasic">

                                    <tr>
                                        <td>用户总数：</td>
                                        <td><strong><?php echo $arr['num'] ?></strong></td>
                                        <td>系统语言：</td>
                                        <td><strong>zh_cn</strong></td>
                                    </tr>
                                    <tr>
                                        <td>安装时间</td>
                                        <td><strong><?php echo $arr['time'] ?>
                                            </strong></td>
                                        <td>编码：</td>
                                        <td><strong>UTF-8</strong></td>
                                    </tr>
                                    <tr>
                                        <td>总访问量</td>
                                        <td><strong><?php  echo $arr['pv']?></strong></td>
                                        <td>站点模板：</td>
                                        <td><strong>default</strong></td>
                                    </tr>

                                </table>
                            </ul>
                        </div>
                    </td>
                    <td valign="top" class="pl">
                        <div class="indexBox">
                        
                            </ul>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="indexBox">
              <div class="boxTitle">
<ul class="ipage"><a href="javascript:void(0); " class="child1"> 管理员  登录记录</a></ul>
                           </div>
                            <ul>
                                <table width="100%" border="0" cellspacing="0" cellpadding="7" class="table table-hover text-center">
                                    <tr>
                                        <td width="30%">Admin</td>
                                        <td width="30%">IP地址</td>
                                        <td width="30%">操作时间</td>
                                    </tr>
                                    <?php use Symfony\Component\HttpFoundation\Session\Session;$session = new Session;

                                   $data = @$session->get("login_info");?>
                                    <?php if($data){ ?>
                                    <?php foreach($data as $key => $val){?>
                                    <tr>
                                        <td align="center"><?php echo $val->admin_name?> </td>
                                        <td align="center"><?php echo $val->last_ip?>  </td>
                                        <?php ?>
                                        <td align="center"><?php  echo date("Y-m-d H:i:s",$val->last_time)?>  </td>
                                    </tr>
                                    <?php }?>
                                    <?php }?>
<!--                                    @endforeach-->


                                </table>
                                </ul>
            </div>
            <div class="indexBox">
                <div class="boxTitle">
<ul class="ipage"><a href="javascript:void(0);"> 服务器信息</a></ul>
                </div>
                <ul>
                    <table width="60%" border="0" cellspacing="0" cellpadding="7" class="table table-hover text-center">
                        <tr>
                            <td width="120" valign="top">PHP 版本：</td>
                            <td valign="top"><?php echo $arr['php'] ?></td>
                            <td width="100" valign="top">MySQL 版本：</td>
                            <td valign="top">5.5.40</td>
                            <td width="100" valign="top">服务器操作系统：</td>
                            <td valign="top"><?php echo $arr['system'] ?></td>
                        </tr>
                        <tr>
                            <td valign="top">文件上传限制：</td>
                            <td valign="top"><?php echo $arr['max_up'] ?></td>
                            <td valign="top">GD 库支持：</td>
                            <td valign="top">是</td>
                            <td valign="top">Web 服务器：</td>
                            <td valign="top"><?php echo $arr['web'] ?></td>
                        </tr>
                    </table>
                </ul>
            </div>
            <div class="indexBox">
                <div class="boxTitle">
<ul class="ipage"><a href="javascript:void(0);">系统开发</a></ul>
                </div>
                <ul>
                    <table width="100%" border="0" cellspacing="0" cellpadding="7" class="table table-hover text-center">
                        <tr>
                            <td width="120">官网： </td>
                            <td><a href="http://www.qianduoduo.com" target="_blank">http://shine.mylaravel.com</a></td>
                        </tr>
                        <tr>
                            <td> 开发者社区：</td>
                            <td><a href="http://bbs.douco.cn" target="_blank">http://bbs.douco.cn </a><em>（意见建议）</em></td>
                        </tr>
                        <tr>
                            <td> 贡献者： </td>
                            <td>ZhiFen.ShuaiJie.DaWei.LiuJun.YangShuai</td>
                        </tr>
                    </table>
                </ul>
            </div>
        </div>
    </div>
</div>
</body></html>