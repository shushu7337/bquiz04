<h2 class="ct">填寫資料</h2>
<?php
$mem=$Member->find(['acc'=>$_SESSION['member']]);   //取得session傳來的帳號
?>
<table class="all">
    <tr>
        <td class="ct tt">登入帳號</td>
        <td class="pp"><?=$_SESSION['member'];?></td>
    </tr>
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">連絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel'];?>"></td>
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
    $sum=0;
    foreach($_SESSION['cart'] as $goods => $qt){
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
        $sum=$sum+($g['price']*$qt);
    }
    ?>
    <tr class="tt">
        <td colspan="5" class="ct">總價:<?=$sum;?></td>
    </tr>
</table>
<div class="ct">
    <button onclick="buy()">確定送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<script>
function buy(){

    // type 1
    // let data={
    //     'name':$("#name").val(),
    //     'email':$("#email").val(),
    //     'tel':$("#tel").val(),
    //     'addr':$("#addr").val(),
    // }

    // type 2

    let data=$("input").serialize();

    $.post("api/buy.php",data,function(res){   //將資料送去api/buy.php後

        alert("訂購成功\n感謝您的選購");
        // location.href="index.php";
        console.log(res);
    })
}

</script>