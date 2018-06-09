<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    <form action="add_do" method="POST">
    {{ csrf_field() }}
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>