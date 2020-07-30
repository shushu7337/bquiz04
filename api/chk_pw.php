<?php 
    include_once "../base.php";
    
    $table=$_GET['table'];
    $db=new DB($table);
    
    $acc = $_GET['acc'];
    $pw = $_GET['pw'];
    $chk = $db->find(['acc'=>$acc,'pw'=>$pw]);
    // 如果找到的acc 跟POST過來的acc相符的話
    if(!empty($chk)){
        echo 1 ;
        $_SESSION[$table]=$acc;  //此人登入
    }else{
        echo 0 ;
    }
?>