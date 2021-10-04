<div>目前位置：首頁 > 人氣文章區</div>
<style>
    .news-all{
        background:rgba(51,51,51,0.8);
		color:#FFF;
		height:300px;
		width:400px;
		display:none;
		z-index:9999;
		overflow:auto;
        position:absolute;
/*         position:fixed;
        left:900px;
        top:250px; */
        padding:10px;
        box-shadow:0 0 10px #ccc;
        border:10px solid white;

    }

</style>
<table>
    <tr>
        <td width="30%">標題</td>
        <td>內容</td>
        <td width="18%">人氣</td>
    </tr>
    <?php
    $all=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    //$now=(isset($_GET['p']))?$_GET['p']:1;
    $news=$News->all(['sh'=>1]," order by `pop` desc limit $start,$div");
    foreach($news as $n){
    ?>
    <tr>
        <td class="clo news-header"><?=$n['title'];?></td>
        <td class='news-mid' style="position:relative"><?=mb_substr($n['news'],0,30);?>...
            <div class="news-all" style="">
                <h2>
                    <?php
                        switch($n['type']){
                            case 1:
                                echo "健康新知";
                            break;
                            case 2:
                                echo "菸害防治";  
                            break;
                            case 3:
                                echo "癌症防治";
                            break;
                            case 4:
                                echo "慢性病防治";
                            break;
                        }
                    
                    ?>
                </h2>
	            <pre class="ssaa"><?=$n['news'];?></pre>
            </div>
        </td>
        <td>
        <?php

            echo "<span id='vie{$n['id']}'>".$n['pop']."</span>";
            //echo $Log->count(['news'=>$n['id']]);
            echo "個人說";
            echo "<img src='icon/02B03.jpg' style='width:25px;'>";

            if(isset($_SESSION['login'])){

                $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$n['id']]);
                if($chk>0){
                    echo "<a id='good{$n['id']}' href='#' onclick=good(2,{$n['id']},&#39;{$_SESSION['login']}&#39;)>收回讚</a>";
                }else{
                    echo "<a id='good{$n['id']}' href='#' onclick=good(1,{$n['id']},&#39;{$_SESSION['login']}&#39;)>讚</a>";
                }

            }
            
        ?>


        </td>
    </tr>
    <?php
        }
    ?>

</table>
<div>
<?php
        if($now-1>0){
            echo "<a href='index.php?do=pop&p=".($now-1)."' style='font-size:20px'> ";
            echo " < ";
            echo " </a>";
        }

        for($i=1;$i<=$pages;$i++){
            $fontsize=($now==$i)?'26px':'18px';
            echo "<a href='index.php?do=pop&p=$i' style='font-size:$fontsize'> ";
            echo $i;
            echo " </a>";
        }

        if($now+1<=$pages){
            echo "<a href='index.php?do=pop&p=".($now+1)."' style='font-size:20px'> ";
            echo " > ";
            echo " </a>";
        }


?>
</div>
<script>
$(".news-header").hover(
    function(){
        $(this).next().children('.news-all').show();
    },
    function(){
        $(this).next().children('.news-all').hide();
    }
)
$(".news-mid").hover(
    function(){
        $(this).children('.news-all').show();
    },
    function(){
        $(this).children('.news-all').hide();
    }
)


</script>