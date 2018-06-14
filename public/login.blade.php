<!DOCTYPE html>
<html lang="zh-cn">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" href="admin/css/pintuer.css">
    <link rel="stylesheet" href="admin/css/admin.css">
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/pintuer.js"></script>

    <script src="jquery-1.12.1.min.js"></script>
    <script src="jquery.slideunlock.js"></script>
    <link href="./slide-unlock.css" rel="stylesheet">
    <style>

        .field{margin: 10px;}

        html, body, h1 {
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #393939;
            color: #d5d4ff;
            overflow: hidden
        }
        #demo {
            width: 600px;
            margin: 150px auto;
            padding: 10px;
            border: 1px dashed #d5d4ff;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
            <form action="/a_login" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="admin_name" placeholder="登录账号" data-validate="required:请填写账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="admin_pwd" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div id="slider" style="margin: 15px auto auto">
                            <div id="slider_bg"></div>
                            <span id="label">>></span> <span id="labelTip">拖动滑块验证</span>
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>          
        </div>
    </div>
</div>

</body>
</html>
<script>



    $(function () {
        var check ={
//            "user_name":false,
//            "user_pwd":false,
            "code":false
        };

        $(function () {
            var slider = new SliderUnlock("#slider",{
                successLabelTip : "欢迎访问二十二世纪后台"
            },function(){
              check.code = true;
            });
            slider.init();
        });

        $("form").submit( function () {
//            $('input[name="user_name"]').trigger('blur');
//            $('input[name="user_pwd"]').trigger('blur');

            if(check.code){
                return true;
            }else{

             alert("请先拖动滑块验证");
                return false;
            }
        });

    })
</script>