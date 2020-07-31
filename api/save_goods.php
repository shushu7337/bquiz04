<?php
include_once "../base.php";

//如果傳來的id值沒有id值，給他一個商品編號
if(empty($_POST['id'])){
    $_POST['no']=rand(100000,999999);    //等同genNo()功能
}
// $_POST['sh']=1;

if(!empty($_FILES['img']['tmp_name'])){
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_POST['img']);
}

$Goods->save($_POST);
to("../admin.php?do=th");
?>