
<div>目前位置：首頁 > 問卷調查</div>

<table class="tab cent">
    <tr>
        <td width="10%">編號</td>
        <td >問卷題目</td>
        <td width="10%">投票總數</td>
        <td width="10%">結果</td>
        <td width="10%">狀態</td>
    </tr>
    <?php
    $ques=$Que->all(['parent'=>0]);
    foreach($ques as $key=>$que){
    ?>
    <tr>
        <td><?=$key+1;?></td>
        <td><?=$que['text'];?></td>
        <td><?=$que['vote'];?></td>
        <td><a href="index.php?do=result&id=<?=$que['id'];?>>">結果</a></td>
        <td>
            <?php
                if(isset($_SESSION['login'])){
                    echo "<a href='index.php?do=vote&id={$que['id']}'>";
                    echo "參與投票";
                    echo "</a>";
                }else{
                    echo "請先登入";
                }
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>