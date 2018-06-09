


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@extends('layout.base')
</head>

<body>
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">用户管理</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="userAdd">添加用户</a></h3>

            </div>
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">



    <center>


    <table style="width:500px;  height:5px; text-align:center" class="active" cellspacing="0" cellpadding="0">
                                    <tr class="active" style="background:orange">
                                        <td class="active">ID</td>
                                        <td class="active">用户姓名</td>
                                        <td class="active">个人电话</td>
                                        <td class="active">创建时间</td>
                                        <td class="active">是否会员</td>
                                        <td class="active">是否实名</td>

                                        <td class="active">操作</td>
                                    </tr>
                                    <?php foreach($data as $k=>$v){?>
                                   <tr class="active" >
                                        <td class="active"><?= $v['uid']?></td>
                                        <td class="active"><?= $v['userName']?></td>
                                        <td class="active"><?= $v['tel']?></td>
                                        <td class="active"><?= $v['createTime']?></td>
                                        <td class="active"><?= $v['isMember']?></td>
                                        <td class="active"><?= $v['status']?></td>
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
