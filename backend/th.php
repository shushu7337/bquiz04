<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類
    <input type="text" name="big" id="big">
    <button onclick="add_big()">新增</button>
</div>
<div class="ct">新增中分類
    <select name="mid" id="mid"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="add_mid()">新增</button>

</div>


<script>
function add_big(){
    $.post("api/add_big.php",{'name':$("#big").val(),'parent':0},function(){
        $.get("api/get_bigs.php",function(options){
            $("#mid").html(options)
        })
    })
}

function add_mid(){

    
}

</script>