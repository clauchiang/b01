<?php
$do = $_GET['do'] ?? 'title';
include_once "../base.php";
?>
<h3 class="cent"><?= $Str->updateModal[0]; ?></h3>
<hr>
<form action="./api/edit_sub.php" method="post" enctype="multipart/form-data">
    <table id="table">
        <tr>
            <td><?= $Str->updateModal[1]; ?></td>
            <td><?= $Str->updateModal[2]; ?></td>
            <td>刪除</td>
        </tr>
        <?php
        $rows = $Menu->all(['main_id' => $_GET['id']]);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?=$row['text'];?>"></td>
                <td><input type="text" name="href[]" value="<?=$row['href'];?>"></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="addFun()">
        <input type="hidden" name="table" value="<?= $do; ?>">
        <input type="hidden" name="main_id" value="<?= $_GET['id']; ?>">
    </div>
</form>

<script>
    function addFun() {
        let sub = `  
                <tr>
                    <td><input type="text" name="text2[]"></td>
                    <td><input type="text" name="href2[]"></td>
                    <td></td>
                </tr>`
        $("#table").append(sub);
    }
</script>