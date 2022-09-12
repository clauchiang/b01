<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $Str->header; ?></p>
    <form method="post" target="back" action="./api/update_text.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td><?= $Str->tdHeader[0]; ?></td>
                    <td ><input style="width: 300px;" type="text" name="total" value="<?= $DB->find(1)['total']; ?>"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="table" value="<?= $do; ?>">
    </form>
</div>