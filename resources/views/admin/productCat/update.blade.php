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
                    <div class="panel-heading">产品添加</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form action="productCatupdate" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>产品名称</label>
                                    <input class="form-control" name="catName" placeholder="产品名称">
                                </div>s
                                <div class="form-group">
                                    <label>产品描述</label>
                                    <input class="form-control" name="description" placeholder="产品描述">
                                </div>
                                <div class="form-group">
                                    <label>利率最低</label>
                                    <input class="form-control" name="proPriceCatMin" placeholder="产品利率最低">
                                </div>
                                <div class="form-group">
                                    <label>利率最高</label>
                                    <input class="form-control" name="proPriceCatMax" placeholder="产品利率最高">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                            </div>
                        </form>s
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div><!--/.main-->
</body>

</html>
