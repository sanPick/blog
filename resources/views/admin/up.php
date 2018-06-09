<?php
/**
 * @Author: Marte
 * @Date:   2018-06-04 14:48:05
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-06-04 22:04:29
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<center>
    <form action="save"  method="post"  enctype="multipart/form-data" >
      <table>
            <tr>
            <td>姓名</td>
            <td>
            <input type="hidden" name="id" value="<?php echo $arr->id ?>"/>
            <input type="text" name="name" value="<?php echo $arr->name ?>" /></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="password" value="<?php echo $arr->password ?>" /></td>
        </tr>
        <tr>
            <td>图片</td>
            <td><input type="file" name="photo"/>
             <img src="<?php echo $arr->img ?>" alt="" width="100px" />
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="添加" /></td>
        </tr>
      </table>
    </form>
</center>


</body>
<script type="text/javascript"></script>
</html>