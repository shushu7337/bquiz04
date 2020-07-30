<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=db08";
    private $root="root";
    private $password="";
    private $table;
    private $pdo;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->root,$this->password);
    }

    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(!empty($arg[0]) && is_array($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where ".implode(" && ",$tmp);
        }
        if(!empty($arg[1])){
            $sql=$sql.$arg[1];
        }
        return $this->pdo->query($sql)->fetchAll();
    }

    public function count(...$arg){
        $sql="SELECT COUNT(*) FROM $this->table ";
        if(!empty($arg[0]) && is_array($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where ".implode(" && ",$tmp);
        }
        if(!empty($arg[1])){
            $sql=$sql.$arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    public function find($arg){
        $sql="SELECT * FROM $this->table ";
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where ".implode(" && ",$tmp);
        }else{
            $sql=$sql." where `id`='$arg'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function del($arg){
        $sql="DELETE FROM $this->table ";
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql=$sql." where ".implode(" && ",$tmp);
        }else{
            $sql=$sql." where `id`='$arg'";
        }
        return $this->pdo->exec($sql);
    }

    public function save($arg){
        if(!empty($arg['id'])){
            foreach($arg as $key => $value){
                if($key!='id'){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                }
            }
            $sql="UPDATE $this->table SET ".implode(",",$tmp)." where `id`='".$arg['id']."'";
        }else{
            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($arg))."`) VALUES('".implode("','",$arg)."')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    public function q($arg){
        return $this->pdo->query($sql)->fetchAll();
    }
}

function to($url){
    header("location:$url");
}

$Admin=new DB("admin");
$Member=new DB("member");
$Goods=new DB("goods");
$Type=new DB("type");
$Ord=new DB("ord");
$Bottom=new DB("bottom");

$bottom=$Bottom->find(1);
?>