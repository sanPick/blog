


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@extends('layout.base')
</head>

<body>
@section('content')
<div >
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>
<!-- .breadcrumb -->
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        </div><!--/.row-->


        <div class="row">
            <div class="col-lg-12">



    <center>


     <div >
     <form  method='post' action="addNode">
        {{csrf_field()}}
                        <?php foreach($node_tree as $topNode){?>
                        <div >
                            <input type="checkbox" name='nodeId[]' value='<?= $topNode["nodeId"]; ?>' <?= isset($role_node[$topNode["nodeId"]]) ? 'checked' : '' ; ?> />
                            <?= $topNode['nodeName'];?>
                            <br/>
                            <?php foreach($topNode['child'] as  $val){?>
                            <span style="margin-left:50px"></span>
                            <input type="checkbox" name="nodeId[]" value='<?= $val["nodeId"];?>'<?= isset($role_node[$val["nodeId"]])? 'checked':''; ?> />
                            <?= $val['nodeName'];?>
                            <?php }?>
                        </div>
                        <?php } ?>
                    </div>
                    <div >
                        <div >
                        <input type="hidden" name="roleId" value="<?php echo $_GET['id']?>">
                            <button >
                                <i ></i>

                                增加
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button >
                                <i ></i>
                                重置
                            </button>
                        </div>
                    </div>
                    </form>
</center>
</body>
</html>
@endsection