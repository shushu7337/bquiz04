<?php
    $type=(!empty($_GET['type']))?$_GET['type']:"0";    //得到首頁傳來的type值  (這裡傳過來的type值即為type資料表中的id值)
    if(empty($type)){       
        $goods=$Goods->all(['sh'=>1]);  //如果值為空的話，就撈出所有商品
        $nav='全部商品';
    }else{
        $tt=$Type->find($type); //從type資料表中 找(傳過來的id值)的資料
        if($tt['parent']==0){   //此處的tt 為 type 資料表中的 parent值
            $goods=$Goods->all(['sh'=>1,'big'=>$type]); //撈出大分類商品    (如果parent為0的話表示他是大分類 沒有中分類所以只撈出大分類)
            $nav=$tt['name'];
        }else{
            $goods=$Goods->all(['sh'=>1,'mid'=>$type]); //撈出中分類商品    (如果parent 不為0的話 就是中分類項目)
            $nav=$Type->find($tt['parent'])['name']. " > " . $tt['name'];
        }
    }
?>

<h1>全部商品</h1>
<?php
    foreach($goods as $g){
?>
<div style='display:flex;width:80%;margin:10px auto' class="pp">
        <div style='width:40%;display:flex;justify-content:center;align-items:center;text-align:center'>
            <a href="?do=detail&id=<?=$g['id'];?>"><img src="img/<?=$g['img'];?>" style="width:80%"></a>
        </div>
        <div style='width:60%;'>
            <div class="tt"><?=$g['name'];?></div>
            <div>價格:<?=$g['price'];?>
                <a href="?do=login"><img src="icon/0402.jpg" style="float:right;"></a>
            </div>
            <div>規格:<?=$g['spec'];?></div>
            <div>簡介:<?=mb_substr($g['intro'],0,25,'utf8');?>...</div>
        </div>
</div>

<?php
    }
?>