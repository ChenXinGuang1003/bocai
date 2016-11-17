<?php


echo '
<form action="/member/account/Gold_act.php" method="get" name="GoldForm" id="GoldForm" style="text-align:center;">
  <input type="hidden" name="backGtype" value="" />
  <input type="hidden" name="backRtype" value="" />
  <fieldset style="height: 300px;">
    <legend > <!--快选金额--> </legend>
    <br/>
    <div>
      <input type="text" min="0" id="gold_1" name="aGold[]" placeholder="快选金额" value="10"/>
    </div>
    <br/>
    <div>
      <input type="text" min="0" id="gold_2" name="aGold[]" placeholder="快选金额" value="20"/>
    </div>
    <br/>
    <div>
      <input type="text" min="0" id="gold_3" name="aGold[]" placeholder="快选金额" value="50"/>
    </div>
    <br/>
    <div>
      <input type="text" min="0" id="gold_4" name="aGold[]" placeholder="快选金额" value="100"/>
    </div>
    <br/>
    <div>
      <input type="radio" name="EnableGold" value="0"/>启动
      <input type="radio" name="EnableGold" value="1"/>停用
    </div>
    <br/>
    <div style="line-height:36px;height:36px;">
      <input type="button" class="submit_cen" onclick="setGoldSelect()" name="SaveGold" value="储存" />
    </div>
  </fieldset>
</form>


<script type="text/javascript">
(function(){
    startGoldSelect();
})();

function setGoldSelect(){
    setCookie("gold_1",document.getElementById("gold_1").value,365);
    setCookie("gold_2",document.getElementById("gold_2").value,365);
    setCookie("gold_3",document.getElementById("gold_3").value,365);
    setCookie("gold_4",document.getElementById("gold_4").value,365);
    setCookie("disableGoldSelect",document.getElementsByName("EnableGold")[0].checked==true?"0":"1",365);
}
function startGoldSelect(){
    var gold_1 = getCookie("gold_1");
    var gold_2 = getCookie("gold_2");
    var gold_3 = getCookie("gold_3");
    var gold_4 = getCookie("gold_4");
    var disableGoldSelect = getCookie("disableGoldSelect");

    document.getElementById("gold_1").value = gold_1 || 10 ;
    document.getElementById("gold_2").value = gold_2 || 20 ;
    document.getElementById("gold_3").value = gold_3 || 50 ;
    document.getElementById("gold_4").value = gold_4 || 100 ;
    document.getElementsByName("EnableGold")[(disableGoldSelect=="1"?1:0)].checked = true;
}


function setCookie(c_name,value,expiredays)
{
var exdate=new Date()
exdate.setDate(exdate.getDate()+expiredays)
window.parent.document.cookie=c_name+ "=" +escape(value)+
((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}

function getCookie(c_name)
{
if (window.parent.document.cookie.length>0)
  {
  c_start=window.parent.document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    {
    c_start=c_start + c_name.length+1
    c_end=window.parent.document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=window.parent.document.cookie.length
    return unescape(window.parent.document.cookie.substring(c_start,c_end))
    }
  }
return ""
}

</script>
';