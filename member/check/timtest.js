butt()
run()

function butt()
{
	document.write("<form name=autof style='padding:0px; margin:0px;'>")
	document.write("<br/><input type=submit value=点击这里重新检测刷新访问速度 class='buttonsubmit'><br/><br/>")
	for(var i=1;i<autourl.length;i++)
		document.write("<input type=text name=txt"+i+" size=10 value=测试中……>-><input type=text name=url"+i+" size=40>-><input type=button value=打开链接 onclick=window.open(this.form.url"+i+".value) class='buttonopen hand'><hr size='1' />")
	document.write("</form>")
}

function auto(url)
{
	document.forms[0]["url"+b].value=url
	if(tim>200)
	{document.forms[0]["txt"+b].value="链接超时"}
	else
	{document.forms[0]["txt"+b].value=tim*10+"ms"}
	b++
}

function run()
{
	for(var i=1;i<autourl.length;i++)
		document.write("<img src="+autourl[i]+"/"+Math.random()+" width=1 height=1 onerror=auto('"+autourl[i]+"') style='display:none'>")
}