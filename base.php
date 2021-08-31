<?php 
 session_start();
 date_default_timezone_set("Asia/Taipei");

class DB{
private $dsn="mysql:host=localhost;charset=utf8;dbname=db23";
private $root='root';
private $pw='12345';
private $table;
private $pdo;


public function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->$dsn,$this->$root,$this->$pw);
}

public function all(...$arg){
    $sql="select * from $this->table";

if(isset($arg[0])){
    if(is_array($arg[0])){
      foreach($arg[0] as $key => $vaule){
          $tmp[]=sprintf("`%s`='%s'",$key,$vaule);
      }
      $sql=$sql . "where" . implode("&&",$tmp);
    }else{
        $sql=$sql . $arg[0];
    }

    if(isset($arg[1])){
        $sql=$sql . $arg[1];
    }
}


return $this->pdo->query($sql)->fetchAll();

}


public function count(...$arg){
    $sql="select count(*) from $this->table";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $vaule){
            $tmp[]=sprintf("`%s`='%s'",$key,$vaule);
        }
        $sql=$sql . "where" . implode("&&",$tmp);
    }else{
        $sql=$sql . $arg[0];
    }

    if(isset($arg[1])){
        $sql=$sql . $arg[1];
    }
}


return $this->pdo->query($sql)->fetchColumn();

 }


 public function find($id){
    $sql="select * from $this->table";
    if(is_array($id)){
        foreach($is as $key => $vaule){
            $tmp[]=sprintf("`%s`='%s'",$key,$vaule);
        }
        $sql=$sql . "where" . implode("&&",$tmp);
    }else{
        $sql=$sql . "where `id`='$id'";
    }

    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
 }




 public function del($id){
     $sql="select * from $this->table";
     if(is_array($id)){
         foreach($id as $key =>$vaule){
             $tmp[]=sprintf("`%s`='%s'",$key,$vaule);
         }
         $sql=$sql . "where". impolde("&&",$tmp);
     }else{
         $sql=$sql . "where `id`='$id'";
     }
     return $this->pdo->exec($sql);
 }

public function sum($col){
    $sql="select sum(`$col`) from $this->table";
    return $this->pdo->query($sql)->fetchColumn();
}
 

public function save($array){
if(isset($array['id'])){
    foreach($array as $key => $vaule){
        if($key!='id'){
            $tmp[]=sprintf("`%s`='%s'",$key,$vaule);

        }
    } 
    
}





}