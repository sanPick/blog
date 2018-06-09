<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
<center>
    <table border="1">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>年龄</td>
            <td>操作</td>
        </tr>
        <?php foreach($data as $v){?>
        <tr>
            <td><?= $v['id']?></td>
            <td><?= $v['memberName']?></td>
            <td><?= $v['uid']?></td>

            <td><a href="del?id=<?= $v['id']?>">删除</a></td>
        </tr>
        <?php }?>
    </table>
</center>
</body>
</html>