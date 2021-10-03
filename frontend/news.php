<div>目前位置：首頁 > 最新文章區</div>
<style>
    .news-all{
        display:none;
    }


</style>
<table>
    <tr>
        <td width="30%">標題</td>
        <td>內容</td>
        <?=(isset($_SESSION['login']))?"<td>人氣</td>":"";?>
    </tr>
    <?php
    $all=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    //$now=(isset($_GET['p']))?$_GET['p']:1;
    $news=$News->all(['sh'=>1]," limit $start,$div");
    foreach($news as $n){
    ?>
    <tr>
        <td class="clo news-header"><?=$n['title'];?></td>
        <td>
            <div class="news-title"><?=mb_substr($n['news'],0,30);?>...</div>
            <div class="news-all"><?=nl2br($n['news']);?></div>
    </td>
        <?php
            if(isset($_SESSION['login'])){
                echo "<td>";
                $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$n['id']]);
                if($chk>0){
                    echo "<a id='good{$n['id']}' href='#' onclick=good(2,{$n['id']},&#39;{$_SESSION['login']}&#39;)>收回讚</a>";
                }else{
                    echo "<a id='good{$n['id']}' href='#' onclick=good(1,{$n['id']},&#39;{$_SESSION['login']}&#39;)>讚</a>";
                }
                echo "</td>";
            }
            
        ?>
    </tr>
    <?php
        }
    ?>

</table>
<div>
<?php
        if($now-1>0){
            echo "<a href='index.php?do=news&p=".($now-1)."' style='font-size:20px'> ";
            echo " < ";
            echo " </a>";
        }

        for($i=1;$i<=$pages;$i++){
            $fontsize=($now==$i)?'26px':'18px';
            echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize'> ";
            echo $i;
            echo " </a>";
        }

        if($now+1<=$pages){
            echo "<a href='index.php?do=news&p=".($now+1)."' style='font-size:20px'> ";
            echo " > ";
            echo " </a>";
        }


?>
</div>
<script>
$(".news-all,.news-title").on("click",function(){
    $(this).toggle()
    $(this).siblings().toggle()
})

$(".news-header").on("click",function(){
    $(this).next().children(".news-all,.news-title").toggle();
})
</script>