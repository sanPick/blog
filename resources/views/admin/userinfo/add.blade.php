<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
@extends('layout.base')
<body>




    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active"></li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">用户详细信息</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="userInfoDo" method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label>邮箱</label>
                                    <input class="form-control" name="eamil" placeholder="邮箱">
                                </div>
                                <div class="form-group">
                                    <label>真实姓名</label>
                                    <input class="form-control" name="realName" placeholder="真实姓名">
                                </div>
                                <div class="form-group">
                                    <label>身份证号</label>
                                    <input class="form-control" name="idCard" placeholder="身份证号">
                                </div>
                                <div class="form-group">
                                    <label>性别</label>
                                    <input class="form-control" name="sex" placeholder="性别">
                                </div>
                                <div class="form-group">
                                    <label>头像</label>
                                    <input class="form-control" name="img" placeholder="头像">
                                </div>
                                <div class="form-group">
                                    <label>零钱</label>
                                    <input class="form-control" name="money" placeholder="零钱">
                                </div>
                                <div class="form-group">
                                    <label>第三方登录方式</label>
                                    <input class="form-control" name="loginStatus" placeholder="第三方登录方式">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div><!--/.main-->
</body>

</html>
