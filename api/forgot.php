<?php
include_once "../base.php";
$email=$_GET['email'];
$result=$Mem->find(['email'=>$email]);
if(!empty($result)){
    echo "你密碼為:" . $result['pw'];
}else{
    echo "查無帳號唷";
}
