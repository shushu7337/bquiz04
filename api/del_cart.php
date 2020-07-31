<?
include_once "../base.php";
session_start();
unset($_SESSION['cart'][$_POST['id']]); //把傳來的id刪除
?>