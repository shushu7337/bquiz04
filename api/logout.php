<?php 
    include_once "../base.php";
    
    // 看session過來哪個表的就unset
    switch($_GET['logout']){
        case "admin":
            unset($_SESSION['admin']);
        break;

        case "member":
            unset($_SESSION['member']);
        break;
    }
    to("../index.php");
    

?>