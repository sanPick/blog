


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
                <li class="active"></li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">

            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">



    <center>
                <select id="add_adminId">
    <?php foreach($data['notAdmin'] as $k=>$v){?>
        <option value=""></option>}

        <option value="<?= $v['adminId']?>"><?= $v['adminName']?></option>
     <?php }?>
    </select>
    <button id="setAdminRole">点击赋权</button>

    <table style="width:500px;  height:5px; text-align:center" class="active" cellspacing="0" cellpadding="0">
                                    <tr class="active" style="background:orange">
                                        <td class="active">编号</td>
                                        <td class="active">角色名称</td>
                                        <td class="active">操作</td>
                                    </tr>
                                    <?php foreach($data['adminIn'] as $k=>$v){?>

                                   <tr class="active" >
                                    <td><?php echo $v['adminId']?></td>
                                    <td><?= $v['adminName']?></td>
                                    <td>
                                    <a href="">删除</a>
                                    </td>
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
<<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(function(){
        // alert(122222222)
        $('#setAdminRole').click(function(){
            var id = $('#add_adminId').val();
            if(!id){
                alert('请选择');
                return false;
            }
            location.href = "addAdmin?roleId="+<?php echo $_GET['id']?>+'&adminId='+id;

        });
    });
</script>

</html>


