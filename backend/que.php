<fieldset>
    <legend>新增問卷</legend>
    <form action="api/admin_que.php" method="post">
    <div style="display:flex">
    <div class="clo">問卷名稱</div>
    <input type="text" name="subject">
    </div>
    <div id="options" class="clo">
        選項<input type="text" name="opts[]">
        <input type="button" value="更多" onclick="more()">
    </div>
    <div>
        <input type="submit" value="新增"> |
        <input type="reset" value="清空">
    </div>
    </form>
</fieldset>
<script>
    function more(){
        let opt=`選項<input type="text" name="opts[]"><br>`
        $("#options").prepend(opt)

    }



</script>