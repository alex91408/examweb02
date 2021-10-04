<fieldset style="width:80%;margin:auto">
    <legend>新增問卷</legend>
    <form action="api/admin_que.php" method="post">
    <div style="display:flex">
        <div class="clo" style="width:40%">問卷名稱</div>
        <div style="width:60%">
            <input type="text" name="subject"  style="width:95%">
        </div>
    </div>
    <div id="options">
        選項<input type="text" name="opts[]" style="width:80%">
        <input type="button" value="更多" onclick="more()">
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </div>
    </form>
</fieldset>
<script>
    function more(){
        let opt=`選項<input type="text" name="opts[]" style="width:80%"><br>`
        $("#options").prepend(opt)

    }



</script>