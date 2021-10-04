<fieldset>
    <legend>帳號管理</legend>
    <form action="api/admin_acc.php" method="post">
    <table class='ct tab' style="margin:auto">
        <tr>
            <td width="30%" class='clo'>帳號</td>
            <td width="30%" class='clo'>密碼</td>
            <td width="40%" class='clo'>刪除</td>
        </tr>
        <?php
        $mems=$Mem->all();
        foreach ($mems as $key => $value) {
            if($value['acc']!='admin'){
        ?>
        <tr>
            <td><?=$value['acc'];?></td>
            <td><?=str_repeat("*",mb_strlen($value['pw']));?></td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
            </td>
        </tr>
        <?php
            }
                }
        ?>
    </table>
    <div class="ct">
        <input type="submit" value="確定刪除">
        <input type="reset" value="清空選取">

    </div>
    </form>

    <h2>新增會員</h2>
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <form>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="註冊" onclick="reg()">
                <input type="reset" value="清除">
            </td>
            <td></td>
        </tr>
    </table>
    </form>


<script>
    function reg(){
        let acc=$("#acc").val();
        let pw=$("#pw").val();
        let pw2=$("#pw2").val();
        let email=$("#email").val();

        if(acc=="" || pw=="" || pw2=="" || email==""){
            alert("不可空白");
        }else if(pw!=pw2){
            alert("密碼錯誤")
        }else{
            $.get('api/chk_acc.php',{acc},(res)=>{
                if(res=='1'){
                    alert('帳號重複')
                }else{
                    $.post('api/save_reg.php',{acc,pw,email},(chk)=>{
                        location.reload();
                    })
                }
            })
        }

    }
</script>
</fieldset>



