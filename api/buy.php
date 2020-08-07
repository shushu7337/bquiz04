<?php
include_once "../base.php";

$data['no']=date("Ymd").rand(100000,999999);    //六位數亂數
$data['total']=0;
foreach($_SESSION['cart'] as $goods => $qt){
    $g=$Goods->find($goods);    //找到商品的id
    $data['total']=$data['total']+($g['price']*$qt);    //
}

$data=array_merge($data,$_POST);  //將對應的資料放進來
$data['acc']=$_SESSION['member'];
$data['goods']=serialize($_SESSION['member']);
// print_r($data);
$Ord->save($data);
unset($_SESSION['cart']);

?>