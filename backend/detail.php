<?php
$ord=$Ord->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red"><?=$ord['no'];?></span></h2>
<table class="all">
    <tr>
        <td class="ct tt">登入帳號</td>
        <td class="pp"><?=$_SESSION['member'];?></td>
    </tr>
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp"><?=$ord['name'];?></td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp"><?=$ord['email'];?></td>
    </tr>
    <tr>
        <td class="ct tt">聯絡地址</td>
        <td class="pp"><?=$ord['addr'];?></td>
    </tr>
    <tr>
        <td class="ct tt">連絡電話</td>
        <td class="pp"><?=$ord['tel'];?></td>
    </tr>
</table>
<table class="all">
    <tr class="tt">
        <td class="ct">商品名稱</td>
        <td class="ct">編號</td>
        <td class="ct">數量</td>
        <td class="ct">單價</td>
        <td class="ct">小計</td>
    </tr>

    <?php
    $cart=unserialize($ord['goods']);
    foreach($cart as $goods => $qt){
        $g=$Goods->find($goods);
    ?>

    <tr class="pp">
        <td class="ct"><?=$g['name'];?></td>
        <td class="ct"><?=$g['no'];?></td>
        <td class="ct"><?=$qt;?></td>
        <td class="ct"><?=$g['price'];?></td>
        <td class="ct"><?=$g['price']*$qt;?></td>
    </tr>
    <?php   
    }
    ?>
    <tr class="tt">
        <td colspan="5" class="ct">總價:<?=$ord['total'];?></td>
    </tr>
</table>
<div class="ct">
    <button onclick="location.href='?do=order'">返回</button>
</div>