<?php
$mem=$Member->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="api/save_mem.php" method="post">
    
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?=$mem['acc'];?></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?=str_repeat("*",strlen($mem['pw']));?></td>
        </tr>
        <tr>
            <td class="tt ct">累積交易額</td>
            <td class="pp"><input type="text" name="pw" id="pw" value=></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value=<?=$mem['name'];?>></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email" value=<?=$mem['email'];?>></td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp"><input type="text" name="addr" id="addr" value=<?=$mem['addr'];?>></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value=<?=$mem['tel'];?>></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$mem['id'];?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="location.href='?do=mem'">
    </div>
</form>