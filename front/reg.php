<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp ">
            <input type="text" name="acc" id="acc">
            <button onclick=chk_acc()>檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct"><button onclick="reg()">註冊</button><button onclick="reset()">重置</button></div> 

<script>
function chk_acc(){
    let acc=$("#acc").val();
    $.get("api/chk_acc.php",{acc},function(re){
        // 當回傳值為1 或帳號為admine時皆不允許註冊
        if(re=='1' || acc=='admin'){
            alert("該帳號已被註冊，請使用其他帳號註冊");
        }else{
            alert("此帳號可使用")
        }
    })
}


function reg(){
    let 
        acc=$("#acc").val(),
        name=$("#name").val(),
        pw=$("#pw").val(),
        addr=$("#addr").val(),
        email=$("#email").val(),
        tel=$("#tel").val();

    // 未避免非同步問題，再次檢查註冊的帳號
    $.get("api/chk_acc.php",{acc},function(re){
    // 當回傳值為1 或帳號為admine時皆不允許註冊
    if(re==1 || acc=='admin'){
        alert("該帳號已被註冊，請使用其他帳號註冊");
    }else{
        $.post('api/reg.php',{acc,name,pw,addr,email,tel},function(re){
            location.href='?do=login'
        })
    }
    })
    
}

function reset(){
    $("input[type='text'],input[type='password']").val("");
}
</script>