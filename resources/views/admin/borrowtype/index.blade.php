


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
                <li class="active">借款类型</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="borrowtypeAdd">添加类型</a></h3>

            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">



    <center>


    <table style="width:500px;  height:5px; text-align:center" class="active" cellspacing="0" cellpadding="0">
                                    <tr class="active" style="background:orange">
                                        <td class="active">ID</td>
                                        <td class="active">类型名称</td>
                                        <td class="active">平台和产品</td>

                                        <td class="active">操作</td>
                                    </tr>
                                    <?php foreach($data as $k=>$v){?>
                                   <tr class="active" >
                                        <td class="active"><?= $v['tId']?></td>
                                        <td class="active"><?= $v['tName']?></td>
                                        <td class="active"><?php if($v['tWay']==1)
                                                      echo '产品';
                                                      else
                                                      echo '平台';      
                                        ?>
                                           
                                        </td>
                                        <td class="active"><a href="borrowtypedel?id=<?php echo $v['tId']?>" class="page-header">删除</a>
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
