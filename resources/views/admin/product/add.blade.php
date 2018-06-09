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
                            <form action="productDo" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>产品名称</label>
                                    <input class="form-control" name="proName" placeholder="产品名称">
                                </div>
                                <div class="form-group">
                                    <label>产品状态</label>
                                    <input class="form-control" name="proStatus" placeholder="产品状态" value="0">
                                </div>
                                <div class="form-group">
                                    <label>产品类型</label>
                                     <select name="cateId" class="form-control">
                                         <option value="0">请选择产品类型</option>
                                         <?php foreach($cat as $k=>$v){?>
                                         <option value="<?= $k?>"><?= $v?></option>
                                         <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>产品金额</label>
                                    <input class="form-control" name="proPrice" placeholder="产品金额">
                                </div>
                                <div class="form-group">
                                    <label>产品描述</label>
                                    <input class="form-control" name="description" placeholder="产品描述">
                                </div>
                                <div class="form-group">
                                    <label>产品利率</label>
                                    <input class="form-control" name="proPriceRate" placeholder="产品利率">
                                </div>
                                <div class="form-group">
                                    <label>产品库存量</label>
                                    <input class="form-control" name="proQuantity" placeholder="产品库存量">
                                </div>
                                <div class="form-group">
                                    <label>产品图片</label>
                                    <input type="file" name="prolmg" >
                                </div>
                                <div class="form-group">
                                    <label>起投金额</label>
                                    <input class="form-control" name="invesMin" placeholder="起投金额">
                                </div>
                                <div class="form-group">
                                    <label>最大可投</label>
                                    <input class="form-control" name="investMax" placeholder="最大可投">
                                </div>
                                <div class="form-group">
                                    <label>已投金额</label>
                                    <input class="form-control" name="bought"  value="0" >
                                </div>
                                <div class="form-group">
                                    <label>计息方式</label>
                                    <input class="form-control" name="interestRateMethod" placeholder="计息方式">
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
