<?php
/**
 * Created by PhpStorm.
 * User: 杨帅
 * Date: 2017/6/7
 * Time: 20:34
 */
Header("content-type:text/html;charset=utf-8");
if(file_exists('cache/weather.cache')){
    if(time()-filemtime('cache/weather.cache')<60*60*12){
        $wea_data = file_get_contents('cache/weather.cache');
        $data = json_decode($wea_data);

    }else{
    //获取客户端IP
    //$ip=$_SERVER["REMOTE_ADDR"];
    //开发阶段测试IP
    $ip="180.175.201.188";
    $ip_api='http://api.jisuapi.com/ip/location?appkey=55f163e1a80d06a5&ip='.$ip;
    $arr=json_decode(file_get_contents($ip_api));

    $weather_api='http://v.juhe.cn/weather/index?format=2&cityname='.$arr->result->area.'&key=721f6ef01d56d3961f55474bcb05a4ab';
    $wea_data = file_get_contents($weather_api);
    file_put_contents('cache/weather.cache', $wea_data);

    $data=json_decode($wea_data);


    }
}else{
    //获取客户端IP
    //$ip=$_SERVER["REMOTE_ADDR"];
    //开发阶段测试IP
    $ip="180.175.201.188";
    $ip_api='http://api.jisuapi.com/ip/location?appkey=55f163e1a80d06a5&ip='.$ip;
    $arr=json_decode(file_get_contents($ip_api));

    $weather_api='http://v.juhe.cn/weather/index?format=2&cityname='.$arr->result->area.'&key=721f6ef01d56d3961f55474bcb05a4ab';
    $wea_data = file_get_contents($weather_api);
    file_put_contents('cache/weather.cache', $wea_data);

    $data=json_decode($wea_data);
    
}

    
$logout_url = 'http://'.$_SERVER['HTTP_HOST'];


?>

<header>
    <div class="header-top min-width">
        <div class="container fn-clear"> <strong class="fn-left">咨询热线：400-668-6698<span class="s-time">服务时间：9:00 - 18:00</span><span></span></strong>
            <ul class="header_contact">

                <li class="c_1"> <a class="ico_head_weixin" id="wx"></a>
                    <div class="ceng" id="weixin_xlgz" style="display: none;">
                        <div class="cnr"> <img src="home/images/22.png"> </div>
                        </div>

                <li class="c_1">

                </li>


            </ul>

            <ul class="fn-right header-top-ul">
                            <li>
                   
                </li>
                <li> <a href="/" class="app">返回首页</a> </li>
<?php if (Session::has('user_id')) {?>           
                <li> 
                    <a href='javascript:;'> <?=@$data->result->today->city ?></a>
                </li> 
                <li> 
                    <a href='javascript:;'><?=@$data->result->today->weather ?></a>
                </li> 
                <li> 
                    <a href='javascript:;' class='app'><?=@$data->result->today->temperature ;?></a>
                </li> 
                <li> 
                    <a href='javascript:;' class='app'>欢迎<font color="red"><?=Session::get('user_name')?></font>登陆</a>
                </li> 
               <li> 
                    <a href='javascript:void(0);' onclick='logout()'><font color='red'>退出</a>
                </li>
                <?php 
                } else 
                {
                ?>
                <li>
                    <div class=""><a href="register" class="c-orange" title="免费注册">免费注册</a></div>
                </li>
                <li>
                    <div class=""><a href="login" class="js-login" title="登录">登录</a></div>
                </li>
                <?php
                }
                ?>


            </ul>

        </div>
    </div>
    <script>
        function logout(){

                $.get("user/logout", function(data){
                    location.href = "<?php echo $logout_url; ?>"
                });

        }
    </script>
    <div class="header min-width">
        <div class="container">
            <div class="fn-left logo"> <a class="" href="javascript:;"> <img src="home/images/logo.png"  title=""> </a> </div>
            <ul class="top-nav fn-clear">
                <li> <a href="/">首页</a> </li>
                <li> <a href="home_loan_list" class="">我要投资</a> </li>
                <li> <a href="helper">安全保障</a> </li>
                <li> <a href="ucenter">我的账户</a> </li>
                <li> <a href="summary">关于我们</a> </li>
            </ul>
        </div>
    </div>
</header>
<script>
        var _url = "<?php echo Request::path()?>";
        $('.top-nav li a').each(function () {
            if ($(this).attr('href')== _url){
                $(this).parent().addClass('on');
            }
        });
</script>