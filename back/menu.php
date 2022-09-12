<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$Str->header;?></p>
    <form method="post" target="back" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td ><?=$Str->tdHeader[0];?></td>
                    <td ><?=$Str->tdHeader[1];?></td>
                    <td ><?=$Str->tdHeader[2];?></td>
                    <td>顯示</td>
                    <td>刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $DB->all(['main_id'=>0]);
                foreach($rows as $row){
                    ?>
                    <tr>
                        <td><input type="text" name="text[]" value="<?=$row['text'];?>" style="width: 90%;"></td>
                        <td><input type="text" name="href[]" value="<?=$row['href'];?>" style="width: 90%;"></td>
                        <td><?=$DB->math('count','id',['main_id'=>$row['id']]);?></td>
                        <td><input type="checkbox" name="hidden[]" value="<?=$row['id'];?>" <?=($row['hidden']==1)?"checked":"";?>></td>
                        <td><input type="checkbox" name="del[]"  value="<?=$row['id'];?>"></td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                        <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/edit_sub.php?do=<?=$Str->table;?>&id=<?=$row['id'];?>')" value="<?=$Str->updateBtn;?>"></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$Str->table;?>.php?do=<?=$Str->table;?>')" value="<?=$Str->addBtn;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="table" value="<?=$do;?>">
    </form>
</div>