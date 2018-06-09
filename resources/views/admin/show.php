<?php
/**
 * @Author: Marte
 * @Date:   2018-06-04 20:21:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-04 21:58:08
 */
// use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    .pagination li{list-style:none;float:left;}
    </style>
</head>
<body>
<center>

        <table>
            <th>id</th>
            <th>用户名</th>

            <th>图片</th>
            <th>操作</th>
        <?php foreach ($data as $k => $v): ?>
                <tr>

                    <td><?php echo $v->id ?></td>
                    <td><?php echo $v->name ?></td>
                    <td><img src="<?php echo $v->img ?>" alt="" width="100px" /></td>
                    <td><a href="del?id=<?php echo $v->id ?>">删除</a> || <a href="up?id=<?php echo $v->id ?>">修改</a> </td>
                </tr>
            <?php endforeach ?>
        </table>

<?php echo $data->links() ?>
</center>


</body>
<script type="text/javascript"></script>
</html