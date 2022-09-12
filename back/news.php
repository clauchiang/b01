<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $Str->header; ?></p>
    <form method="post" target="back" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td><?= $Str->tdHeader[0]; ?></td>
                    <td>顯示</td>
                    <td>刪除</td>
                </tr>
                <?php
                $all = $DB->math('count', 'id');
                $div = 4;
                $pages = ceil($all / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                $rows = $DB->all("limit $start,$div");
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><textarea name="text[]" style="width: 95%;height:60px"><?= $row['text']; ?></textarea></td>
                        <td><input type="checkbox" name="hidden[]" value="<?= $row['id']; ?>" <?= ($row['hidden'] == 1) ? "checked" : ""; ?>></td>
                        <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div style="text-align:center;">
            <?php
            if (($now - 1) > 0) {
                $p = $now - 1;
                echo "<a class='bl' style='font-size:30px;' href='?do=$do&p=$p'>&lt;&nbsp;</a>";
            } else {
                echo "<a class='bl' style='font-size:30px;' href='?do=$do&p=$now'>&lt;&nbsp;</a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $size = ($now == $i) ? "24px" : "";
                echo "<a class='bl' style='font-size:$size;' href='?do=$do&p=$i'> $i </a>";
            }
            if (($now + 1) <= $pages) {
                $p = $now + 1;
                echo "<a class='bl' style='font-size:30px;' href='?do=$do&p=$p'>&nbsp;&gt;</a>";
            } else {
                echo "<a class='bl' style='font-size:30px;' href='?do=$do&p=$now'>&nbsp;&gt;</a>";
            }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $Str->table; ?>.php?do=<?= $Str->table; ?>')" value="<?= $Str->addBtn; ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="table" value="<?= $do; ?>">
    </form>
</div>