<!DOCTYPE html>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="home/css/snscomplete.css">
</head>

<body>
    <div id="main">
        <div class="wcontainer">
            <div class="wwrap  wrap-boxes">
                <div id="js-fill">
                    <div class="wheader-wrap">
                        <h1>完善基本资料</h1>
                        <div id="js-sns-tab" class="sns-complete-tab">
                            <span class="" data-target="js-profile">无帐号</span>
                            <span data-target="js-bind" class="sns-tab-active">绑定已有帐号</span>
                        </div>
                    </div>
                    <div id="js-profile" class="cprofile-wrap sns-block" style="display: none;">
                        <div class="cprofile-inner clearfix">
                            <div class="avator-wrap l">
                                <div class="avator-inner">
                                    <img src="{{ $user_info['img'] }}" alt="头像" title="头像" height="160" width="160">
                                </div>
                            </div>
                            <div class="cprofile-field-wrap">

                            <form id="perfect_reg" action="perfect_reg" method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="wlfg-wrap">
                                    <label class="label-name" for="user_name">用户名</label>
                                    <div class="rlf-group">
                                        <input  name="reg_user_name" id="reg_user_name" class="ipt ipt-user_name" placeholder="请输入登录用户名." type="text" onblur="regCheckUsername()">
                                        <p class="tips"><span id="regUserSP" style="display: none;">用户名将作为您主要的身份识别，请输入您有效的用户名</span></p>
                                    </div>
                                </div>
                                <div class="wlfg-wrap">
                                    <label class="label-name" for="password">密码</label>
                                    <div class="rlf-group">
                                        <input   name="reg_password" id="reg_password" class="ipt ipt-pwd" placeholder="请输入密码." type="password" onblur="regCheckPassword()">
                                        <p class="tips"><span id="regPwdSP" style="display:none">请输入6-16位密码，区分大小写，不能使用空格！</span></p>
                                    </div>
                                </div>
                                <div class="wlfg-wrap">
                                    <label class="label-name" for="password">确认密码</label>
                                    <div class="rlf-group">
                                        <input autocomplete="off" data-validate="password1" name="reg_password1" id="reg_password1" class="ipt ipt-pwd" placeholder="请确认密码." type="password" onkeyup="regCheckPassword1()">
                                        <p class="tips"><span id="regPwd1SP" style="display:none">请再次确认密码</span></p>
                                    </div>
                                </div>
                                <div class="wlfg-wrap">
                                    <label class="label-name" for="password">输入邮箱</label>
                                    <div class="rlf-group">
                                        <input autocomplete="off" data-validate="password1" name="reg_email" id="reg_email" class="ipt ipt-pwd" placeholder="请输入邮箱." type="email" onblur="regCheckEmail()">
                                        <p class="tips"><span id="regUserEM" style="display:none">输入邮箱</span></p>
                                    </div>
                                </div>
                                <div class="wlfg-wrap">
                                    <div class="rlf-group">
                                        <input id="js-reg-btn" class="btn btn-green btn-complete" value="完成" type="button">
                                        <p class="tips" id="cprofile-globle-error"></p>
                                    </div>
                                </div>
                                <input id="image" name="img" value="{{$user_info['img']}}" type="hidden">
                            </form>
                            </div>
                        </div>
                    </div>
                    <div id="js-bind" class="profile-bind sns-block" style="display: block;">
                        <div class="cprofile-inner clearfix">
                            <div class="avator-wrap l">
                                <div class="avator-inner">
                                    <img src="{{$user_info['img']}}" alt="头像" title="头像" height="160" width="160">
                                </div>
                            </div>
                            <div class="cprofile-field-wrap">
                                <form id="-bind" action="perfect_bind" method="post">
                                <input type="hidden" id="open_id" value="{{ $user_info['uniq']}}">
                                    <div class="wlfg-wrap">
                                        <label class="label-name" for="user_name">用户名</label>
                                        <div class="rlf-group">
                                            <input autocomplete="off" id="bind_user_name" data-validate="bind_user_name" name="bind_user_name" class="ipt ipt-user_name" placeholder="请输入登录用户名." type="text" onblur="bindCheckUsername()">
                                            <p class="tips"><span id="bindUserSP" style="display:none">用户名将作为您主要的身份识别，请输入您有效的用户名</span></p>
                                            <input style="display:none" type="text">
                                        </div>
                                    </div>
                                    <div class="wlfg-wrap">
                                        <label class="label-name" for="password">密码</label>
                                        <div class="rlf-group">
                                            <input autocomplete="off" id="bind_password" name="bind_password" class="ipt ipt-pwd" placeholder="请输入密码." type="password" onblur="bindCheckPassword()">
                                            <p class="tips"><span id="bindPwdSP" style="display:none">请输入6-16位密码，区分大小写，不能使用空格！</span></p>
                                        </div>
                                    </div>
                                    <div class="wlfg-wrap">
                                        <label class="label-name">&nbsp;</label>
                                        <div class="rlf-group">
                                            <input id="js-bind-btn" class="btn btn-green bind-btn" value="绑定" type="button">
                                            <p id="js-bind-global-msg" class="tips"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="home/js/jquery.js"></script>

<script>
    $('#js-sns-tab').on('click', 'span', function() {
        var $this = $(this);
        if (!$this.hasClass('sns-tab-active')) {
            $this.addClass('sns-tab-active').siblings('.sns-tab-active').removeClass('sns-tab-active')
                .each(function() {
                    $('#' + $(this).attr('data-target')).hide();
                });
            $('#' + $this.attr('data-target')).show();
        }
    });
    flag = false; // 验证用户名是否唯一
    e_flag = false;// 验证邮箱是否唯一
    function regCheckUsername(){
        var r=/^[a-zA-Z0-9_]{3,16}$/;
        var v = $('#reg_user_name').val();
       
        if(!v.length){
            $('#regUserSP').html("用户名不能为空！");
            $('#regUserSP').removeAttr('style');
            return flag  = false;
        }
        if(!r.test(v)){
            $('#regUserSP').html("用户名格式不正确！");
            $('#regUserSP').removeAttr('style');
            return flag  = false;
        }
        // 查询用户唯一性
        $.get("checkuser/"+v ,
            function(msg){
            if (msg==1) {
                $('#regUserSP').html("用户名已经存在！");
                $('#regUserSP').removeAttr('style');
                flag  = false;
            }else{
                flag = true;
                $('#regUserSP').attr('style','display:none');
            }
        });

        return flag;
    }
    function regCheckEmail(){
        var v=$('#reg_email').val();
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        if(!reg.test(v)){
            $('#regUserEM').html("邮箱不合法！");
            $('#regUserEM').removeAttr('style');
            return false;
        }
        // 查询邮箱唯一性
        $.get("checkemail/"+v ,
            function(msg){
                if (msg==1) {
                    $('#regUserEM').html("邮箱已经存在！");
                    $('#regUserEM').removeAttr('style');
                    e_flag  = false;
                }else{
                    e_flag = true;
                    $('#regUserEM').attr('style','display:none');
                }
            });
        return e_flag;
    }
    function regCheckPassword(){
        var v=$('#reg_password').val();
        if(!v.length){
            $('#regPwdSP').html("密码不能为空！");
            $('#regPwdSP').removeAttr('style');
            return false;
        }
        $('#regPwdSP').attr('style','display:none');
        return true;
    }
    function regCheckPassword1(){
        var v=$('#reg_password').val();
        var v1=$("#reg_password1").val();
        if (v!=v1) {
            $('#regPwd1SP').html( "两次密码不一致");
            $('#regPwd1SP').removeAttr('style');
            return false;
        }
        $('#regPwd1SP').attr('style','display:none');
        return true;
    }
    function bindCheckUsername(){
        var r=/^[a-zA-Z0-9_]{3,16}$/;
        var v = $('#bind_user_name').val();
        if(!v.length){
            $('#bindUserSP').html("用户名不能为空！");
            $('#bindUserSP').removeAttr('style');
            return false;
        }
        if(!r.test(v)){
            $('#bindUserSP').html("用户名格式不正确！");
            $('#bindUserSP').removeAttr('style');
            return false;
        }
        $('#bindUserSP').attr('style','display:none');
        return true;
    }
    function bindCheckPassword(){
        var v=$('#bind_password').val();
        if(!v.length){
            $('#bindPwdSP').html(  "密码不能为空！");
            $('#bindPwdSP').removeAttr('style');
            return false;
        }
        $('#bindPwdSP').attr('style','display:none');
        return true;
    }
    $(function(){
        $('#js-reg-btn').click(function(){
            if (regCheckUsername() && regCheckPassword() &&regCheckPassword1() &&regCheckEmail()) {
                var data = {
                    '_token':$('input[name=_token]').val(),
                    'user_name':$('#reg_user_name').val(),
                    'open_id':$('#open_id').val(),
                    'password':$('#reg_password').val(),
                    'email':$('#reg_email').val(),
                };
                $.post("perfect_reg", data,
                    function(msg){
                        if (msg.success==1) {
                            //注册成功
                            alert('注册成功,去登陆');
                            location.href = '/login';
                        };
                }, "json");
            };
        });
        $('#js-bind-btn').click(function(){
            if (bindCheckUsername() && bindCheckUsername() ) {
                var data = {
                    '_token':$('input[name=_token]').val(),
                    'user_name':$('#bind_user_name').val(),
                    'open_id':$('#open_id').val(),
                    'password':$('#bind_password').val(),
                };
                $.post("perfect_bind", data,
                    function(msg){
                        if (msg.success==1) {
                            location.href = '/';
                        } else {
                            alert(msg.msg);
                        };
                }, "json");
            };
        });
    })
</script>


</body></html>