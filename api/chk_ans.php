<?php
include_once "../base.php";
// 如果正解ans == 被傳過來的ans
if($_SESSION['ans']==$_GET['ans']){
    echo 1;
}else{
    echo 0;
}

?>