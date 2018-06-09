<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="add_do" method="post">
    {{csrf_field()}}
    <center>
        <table border="1">
            <tr>
                <td>姓名</td>
                <td><input type="text"  name="memberName" /></td>
            </tr>
            <tr>
                <td>年龄</td>
                <td>
<!--                    <select name="uid">
                    <?php for($i=10;$i<=35;$i++){?>
                    <option value="<?= $i?>"><?= $i?></option>
                    <?php }?>
                    </select>-->
                    <select name="uid">
                        <?php for($i=10;$i<=40;$i++){?>
                        <option value="<?= $i?>"><?= $i?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="提交" /></td>
                <td></td>
            </tr>
        </table>
        </center>
    </form>
</body>
</html>