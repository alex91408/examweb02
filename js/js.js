// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
function good(type,news,acc)
{
	$.post("api/good.php",{type,news,acc},function(res)
	{
		if(type=="1")
		{
			$("#vie"+news).text($("#vie"+news).text()*1+1)
			$("#good"+news).text("收回讚").attr("onclick","good(2,'"+news+"','"+acc+"')")
		}
		else
		{
			$("#vie"+news).text($("#vie"+news).text()*1-1)
			$("#good"+news).text("讚").attr("onclick","good(1,'"+news+"','"+acc+"')")
		}
	})
}