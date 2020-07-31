<style>
    .all td
{
	min-width:50px;
	padding:10px;
}
</style>
<?php
// 判斷是否有傳id過來
if(!empty($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt']; //購物車內的商品id 及 數量
}else if(!empty($_SESSOIN['cart'])){  //如果會員登入後，購物車是空的，且直接點到購物車的網頁
    echo "<h2 class='ct'>請選擇商品<h2>";
}

// 判斷有沒有會員登入
if(empty($_SESSION['member'])){
    to("?do=login");
}

echo "<h2 class='ct'>".$_SESSION['member']."的購物車</h2>";
?>
<table class="all ct">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
<?php
foreach($_SESSION['cart'] as $id => $qt){
    $goods=$Goods->find($id);   //拿到商品資料
?>
    <tr class="pp">
        <td><?=$goods['no'];?></td>
        <td><?=$goods['name'];?></td>
        <td><?=$qt;?></td>
        <td><?=$goods['stock'];?></td>
        <td><?=$goods['price'];?></td>
        <td><?=$goods['price']*$qt;?></td>
        <td>
            <a href="javascript:delCart(<?=$goods['id'];?>)"><img src="icon/0415.jpg"></a>
        </td>
    </tr>
<?php
}
?>
</table>

<script>
    function delCart(id){
        $.post("api/del_cart.php",{id},function(){
            location.reload();
        })
    }
</script>