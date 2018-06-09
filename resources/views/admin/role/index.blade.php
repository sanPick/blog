


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
                <li class="active">角色管理</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="roleAdd">添加角色</a></h3>

            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">



    <center>


    <table style="width:500px;  height:5px; text-align:center" class="active" cellspacing="0" cellpadding="0">
                                    <tr class="active" style="background:orange">
                                        <td class="active">ID</td>
                                        <td class="active">角色</td>
                                        <td class="active">角色管理</td>
                                        <td class="active">操作</td>
                                    </tr>
                                    <?php foreach($data as $k=>$v){?>
                                   <tr class="active" >
                                        <td class="active"><?= $v['roleId']?></td>
                                        <td class="active"><?= $v['roleName']?></td>
<<<<<<< HEAD
                                        <td class="active"><a href="" class="page-header">分配管理员</a>   <a href="" class="page-header">分配权限</a></td>
=======
                                        <td class="active"><a href="setAdmin?id=<?= $v['roleId']?>" class="page-header">分配管理员</a>   <a href="setNode?id=<?= $v['roleId']?>" class="page-header">分配权限</a></td>
>>>>>>> origin/wangzhongen
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
