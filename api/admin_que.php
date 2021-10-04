<?php include_once "../base.php";

$Que->save(['text'=>$_POST['subject'],'parent'=>0,'vote'=>0]);
$parent=$Que->find(['text'=>$_POST['subject']])['id'];

foreach($_POST['opts'] as $opt){
    $Que->save(['text'=>$opt,'parent'=>$parent,'vote'=>0]);
}

to("../backend.php?do=que");
