<?php
$que=$Que->find($_GET['id']);

?>
<div>目前位置：首頁 > 問卷調查 > <?=$que['text'];?></div>

<h3><?=$que['text'];?></h3>
<form action="api/vote.php" method='post'>
<?php
$opts=$Que->all(['parent'=>$que['id']]);
foreach($opts as $opt){
echo "<p>";
echo "<input type='radio' name='opt' value='{$opt['id']}'>";
echo $opt['text'];
echo "</p>";
}

?>
<input type="submit" value="我要投票">
</form>