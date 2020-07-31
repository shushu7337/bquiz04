<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類
    <input type="text" name="big" id="big">
    <button onclick="add_big()">新增</button>
</div>
<div class="ct">新增中分類
    <select name="mid" id="mid"></select>
    <input type="text" name="mid_name" id="mid_name">
    <button onclick="add_mid()">新增</button>

</div>
<table class="all type-list"></table>

<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $goods=$Goods->all();
    foreach($goods as $g){
    ?>
    <tr class="pp">
        <td class="ct"><?=$g['no'];?></td>
        <td><?=$g['name'];?></td>
        <td class="ct"><?=$g['stock'];?></td>
        <td class="ct" id="g<?=$g['id'];?>">
            <?=($g['sh']==1)?"販售中":"已下架";?>
        </td>
        <td class="ct">
            <button onclick="location.href='?do=edit_goods&id=<?=$g['id'];?>'">修改</button>
            <button onclick="del('goods',<?=$g['id'];?>)">刪除</button>
            <button onclick="sh(<?=$g['id'];?>,1)">上架</button>
            <button onclick="sh(<?=$g['id'];?>,2)">下架</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
getTypeList();  //先執行一次
getBigOption();

// 新增大分類
function add_big(){
    $.post("api/save_type.php",{'name':$("#big").val(),'parent':0},function(){
        getBigOption();
        getTypeList();
    })
}
// 得到大分類
function getBigOption(){
    $.get("api/get_bigs.php",function(options){
            $("#mid").html(options);
        })  
}

// 新增中分類
function add_mid(){
    let 
        name=$("#mid_name").val(),
        big=$("#mid").val();
    $.post("api/save_type.php",{'name':name,'parent':big},function(){
        getBigOption();
        getTypeList();
    })
}
// 大分類項目
function getTypeList(){
    $.get("api/get_type_list.php",function(list){
        $(".type-list").html(list);
    })
}

function edit(id){
    let newName=prompt("請輸入要修改的分類名稱",$("#t"+id).html());
    if(newName!=null){
        $("#t"+id).html(newName);
        $.post("api/edit_type.php",{id,newName});
    }
}

function sh(id,type){
    $.post("api/sh.php",{id,type},function(){
        switch(type){
            case 1:
                $("#g"+id).html('販售中')
            break;

            case 2:
                $("#g"+id).html('已下架')
            break;
        }
        console.log(type);
    })
}
</script>