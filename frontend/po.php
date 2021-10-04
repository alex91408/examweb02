<div>目前位置:首頁 > 分類網誌 > <span id="navType"></span></div>

<fieldset style="width: 15%;display:inline-block;vertical-align:top">
<legend>分類網誌</legend>
<p><a class="type" id="t1" href="#">健康新知</a></p>
<p><a class="type" id="t2" href="#">菸害防制</a></p>
<p><a class="type" id="t3" href="#">癌症防治</a></p>
<p><a class="type" id="t4" href="#">慢性病防治</a></p>

</fieldset>

<fieldset style="width:75%;display:inline-block">
    <legend id="legendTitle">文章列表</legend>
    <div id="titles"></div>
    <div id="Post"></div>
</fieldset>

<script>
getList(1)

$(".type").on("click",function(){
    let type=$(this).attr('id').replace("t","");
    getList(type);
})

function getList(type){
    $("#navType").html($("#t"+type).text());
    $.get("api/get_list.php",{type},(list)=>{
    $("#legendTitle").html("文章列表")
    $("#titles").html(list)
    $("#Post").html("")
    })
}

function getNews(id){
    $.get("api/get_post.php",{id},(post)=>{
    $("#legendTitle").html("文章內容")
    $("#titles").html("")
    $("#Post").html(post)
    })
}
</script>