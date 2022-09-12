<?php
$do = $_GET['do'] ?? 'title';
include_once "../base.php";
?>
<h3 class="cent"><?= $Str->updateModal[0]; ?></h3>
<hr>
<form action="./api/update_img.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><?= $Str->updateModal[1]; ?></td>
            <td><input type="file" name="img"></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="更新">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$do;?>">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    </div>
</form>