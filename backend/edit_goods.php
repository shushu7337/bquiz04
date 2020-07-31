<!-- 這裡因為沒有帶id的直接進入網頁的話會跳錯，照常理是要排除此情況，所以要注意進去edit_goods的方式(必須帶id值) -->

<?php

$goods=$Goods->find($_GET['id']);
// 這裡因為是用ajax撈分類所以不能用php的in_array撈
?>
<h2 class="ct">修改商品</h2>
<form action="api/save_goods.php" method="post" enctype="mulipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
            <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?=$goods['no'];?></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?=$goods['name'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="price" value="<?=$goods['price'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="spec" id="spec" value="<?=$goods['spec'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="stock" value="<?=$goods['stock'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" id="img" value="<?=$goods['img'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="intro" style="width:80%;height:100px;"><?=$goods['intro'];?></textarea>
            </td>
        </tr>
    </table>
<div class="ct">
    <input type="hidden" name="id" value="<?=$goods['id'];?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回">
</div>
</form>

<script>
getBigOption();

//拿到大分類
function getBigOption(){
    $.get("api/get_bigs.php",function(options){
        $("#big").html(options);
        
        $("#big option[value='<?=$goods['big'];?>']").prop("selected",true);
        
        //跑完大分類選單後再來執行得到中分類 (若丟到外面則會有非同步問題會得不到bigId，bigId則會為0又成為大分類選單)
        getMidOption();
        // 當id="big"被改變時
        $("#big").on("change",function(){
            getMidOption();
        })
        })  
}

//拿到中分類
function getMidOption(){
    $("#big").val()
    $.get("api/get_Mid.php",{'bigId':$("#big").val()},function(options){
            $("#mid").html(options);
            // 確定資料已經在id="mid的option內再讓option被選擇
            $("#mid option[value='<?=$goods['mid'];?>']").prop("selected",true);
        })  
}
</script>