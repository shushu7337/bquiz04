<?php 
    include_once "../base.php";
    
    
    // POST過來的欄位剛好與資料表的欄位才能直接儲存，若有隱藏欄位或欄位數目不相符則需要另外處理
    
    // 最後傳過來建議也要檢查一次，避免掉封包調換的攻擊
    $Member->save($_POST);


?>