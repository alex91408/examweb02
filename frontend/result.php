<?php
$que=$Que->find($_GET['id']);

?>
<div>目前位置：首頁 > 問卷調查 > <?=$que['text'];?></div>

<h3><?=$que['text'];?></h3>

<?php
$opts=$Que->all(['parent'=>$que['id']]);
foreach($opts as $key => $opt){
    $rate=round($opt['vote']/$que['vote'],2);
echo "<p>";
echo "<div style='width:50%;display:inline-block'>";
echo $key+1 . ". ";
echo $opt['text'];
echo "</div>";
echo "<div style='display:inline-block;background:#ccc;height:20px;width:".(0.4*$rate*100)."%'>";

echo "</div>";
echo "<div style='width:10%;display:inline-block'>";
echo $opt['vote']."票(".($rate*100)."%)";
echo "</div>";
echo "</p>";
}

?>
<button onclick="location.href='index.php?do=que'">返回</button>
