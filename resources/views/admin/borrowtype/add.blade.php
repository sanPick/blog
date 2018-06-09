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
                    <div class="panel-heading">类型添加</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="borrowtypeDo" method="post">
                                {{csrf_field()}}
                                 <div class="form-group">
                                    <label>类型名称</label>
                                    <input class="form-control" name="tName" placeholder="类型名称">
                                </div>
                                <div class="form-group">
                                    <label>平台和产品</label>
                                    <input class="form-control" name="tWay" placeholder="平台和产品">
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