<?php 
    include_once "../base.php";
    
    $acc = $_GET['acc'];
    $chk = $Member->find(['acc'=>$_POST['acc']]);
    // 如果找到的acc 跟POST過來的acc相符的話
    if(!empty($chk)){
        echo 1 ;
    }else{
        echo 0 ;
    }


?>