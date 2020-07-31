<h2 class="ct">新增商品</h2>
<form action="api/save_goods.php" method="post" enctype="multipart/form-data">
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
            <td class="pp">
            <span >完成分類後自動分配</span>
            <!-- <span  id="noo">完成分類後自動分配</span>  (可直接在save_goods中生成)-->
            <!-- <input type="hidden" name="no" id="no">  (可直接在save_goods中生成)-->
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="price">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="spec" id="spec">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="stock">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="intro" style="width:80%;height:100px;"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
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
        //跑完大分類選單後再來執行得到中分類 (若丟到外面則會有非同步問題會得不到bigId，bigId則會為0又成為大分類選單)

        // genNo();    //一開始也讓他跑一次(可直接在save_goods中生成)

        getMidOption();
        // 當id="big"被改變時
        $("#big").on("change",function(){
            getMidOption();

            // genNo(); //(可直接在save_goods中生成)
        })
    })  
}

//拿到中分類
function getMidOption(){
    $("#big").val()
    $.get("api/get_Mid.php",{'bigId':$("#big").val()},function(options){
            $("#mid").html(options);
        })  
}

// function genNo(){    //(可直接在save_goods中生成)
//     let no=Math.random().toString().substr(2,6)    //取得隨機數字(0~1的小數) /轉成字串後/取 0. 後的六碼所以起始為(2)後(6)碼
//     $("#noo").html(no);
//     $("#no").val(no);
// }
</script>