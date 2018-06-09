


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
@extends('layout.base')
</head>

<body>
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">产品</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="productAdd">添加产品</a></h3>

            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">



    <center>


    <table border="1" style="width:1000px;  height:5px; text-align:center" class="active" cellspacing="0" cellpadding="0">
                                    <tr class="active" style="background:orange">
                                        <td class="active">产品id</td>
                                        <td class="active">产品名称</td>
                                        <td class="active">产品状态</td>
                                        <td class="active">产品类型id</td>
                                        <td class="active">产品金额</td>
                                        <td class="active">产品描述</td>
                                        <td class="active">产品利率</td>
                                        <td class="active">产品库存量</td>
                                        <td class="active">产品图片</td>
                                        <td class="active">起投金额</td>
                                        <td class="active">最大可投</td>
                                        <td class="active">以投金额</td>
                                        <td class="active">计息方式</td>
                                        <td class="active">操作</td>
                                    </tr>
                                    <?php foreach($data as $k=>$v){?>
                                   <tr class="active" >
                                        <td class="active"><?= $v['proId']?></td>
                                        <td class="active"><?= $v['proName']?></td>
                                        <td class="active"><?= $v['proStatus']?></td>
                                        <td class="active"><?= $v['cateId']?></td>
                                        <td class="active"><?= $v['proPrice']?></td>
                                        <td class="active"><?= $v['description']?></td>
                                        <td class="active"><?= $v['proPriceRate']?></td>
                                        <td class="active"><?= $v['proQuantity']?></td>
                                        <td class="active"><img src="<?= $v['proImg']?>" width="150px;" /></td>
                                        <td class="active"><?= $v['invesMin']?></td>
                                        <td class="active"><?= $v['investMax']?></td>
                                        <td class="active"><?= $v['bought']?></td>
                                        <td class="active"><?= $v['interestRateMethod']?></td>
                                        <td class="active"><a href="" class="page-header">删除</a>
                                            <a href="" class="page-header"> 修改</a>
                                        </td>
                                    </tr>
                                    <?php }?>
    </table>

</center>



        </div><!--/.row-->

                    </div>
                </div>
            </div>
        </div><!--/.row-->


    </div><!--/.main-->

@endsection

</body>

</html>
