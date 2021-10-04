<fieldset>
    <legend>最新文章管理</legend>
    <form action="api/admin_news.php" method="post">
    <table class='ct tab' style="margin:auto">
        <tr>
            <td width="10%" >編號</td>
            <td >標題</td>
            <td width="10%" >顯示</td>
            <td width="10%" >刪除</td>
        </tr>
        <?php
        
        $t=$News->count();
        $div=3;
        $pages=ceil($t/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $posts=$News->all(" limit $start , $div ");

        foreach ($posts as $key => $value) {
            
        ?>
        <tr>
            <td class="clo"><?=$key+1+$start;?>.</td>
            <td><?=$value['title'];?></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" 
                    <?=($value['sh']==1)?"checked":"";?>
                >
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
            </td>
        </tr>
        <?php
                }
        ?>
    </table>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
    </form>
    <div class="ct">
            <?php

                if(($now-1)>0){
                    echo "<a href='backend.php?do=news&p=".($now-1)."'> < </a>";
                }

                for($i=1;$i<=$pages;$i++){
                    $font=($i==$now)?'24px':'16px';
                    echo "<a href='backend.php?do=news&p=$i' style='font-size:$font'> $i </a>";
                }

                if(($now+1)<=$pages){
                    echo "<a href='backend.php?do=news&p=".($now+1)."'> > </a>";
                }
            ?>
    </div>
    
</fieldset>



