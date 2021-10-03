<?php
include_once "../base.php";

$id=$_GET['id'];
$post=$News->find($id);

echo nl2br($post['news']);

