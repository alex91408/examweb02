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
       $this->pdo=new PDO($this->dsn,$this->root,$this->password);
   }

  public function all(...$arg){
     $sql="select * from $this->table";

     if(isset($arg[0])){
     if(is_array($arg[0])){
         foreach($arg[0] as $key => $value){
             $tmp[]=sprintf("`%s`='%s'",$key,$vaule);
         }
         $sql=$sql . "where" . implode(" && ",$tmp);
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
   $sql="selcet count(*) from $this->table";

   if(isset($arg[0])){
       if(is_array($arg[0])){
           foreach($arg[0] as $key => $value){
               $tmp[]=sprintf("`%s`='%s'",$key,$vaule);
           }
           $sql=$sql . "where" . implode(" && ",$tmp);
       }else{
           $sql=$sql . $arg[0];
       }

       if(isset($arg[1])){
           $sql=$sql . $arg[1];
       }
   }


    return $this->table->query($sql)->fetchColum();

  }
  



































  
 }