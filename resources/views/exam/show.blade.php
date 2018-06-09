<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
    <style type="text/css">li{display: inline-block;  color: red;}</style>
</head>
<body>
    <center>
        <table border="1" cellspacing="0">
            <tr>
                <td>编号</td>
                <td>用户名</td>
                <td>操作</td>
            </tr>
            <?php foreach($arr as $v){?>
            <tr>
                <td><?= $v['id']?></td>
                <td><?= $v['username']?></td>
                <td><a href="del?id=<?= $v['id']?>">删除</a></td>
            </tr>
            <?php }?>
        </table>
    {!! $arr->links() !!}
    </center>

</body>
</html>