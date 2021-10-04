<?php include_once "../base.php";

$vote=$_POST['opt'];
$opt=$Que->find($vote);
$parent=$Que->find($opt['parent']);

$opt['vote']++;
$parent['vote']++;
$Que->save($opt);
$Que->save($parent);


to("../index.php?do=result&id=".$parent['id']);


