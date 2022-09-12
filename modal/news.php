<?php
$do = $_GET['do'] ?? 'title';
include_once "../base.php";
?>
<h3 class="cent"><?= $Str->addModalHeader; ?></h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><?= $Str->addModalCol[0]; ?></td>
            <td><textarea name="text"></textarea></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$do;?>">
    </div>
</form>