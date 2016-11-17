window.onload=function(){
  var bb=[];	
  var dom=document.getElementsByClassName('gamelist')[0];
  var aa=dom.getElementsByTagName('a');
  for(var i=0;i<aa.length;i++){
  	aa[i].name=aa[i].href;
  	aa[i].href="javascript:;";
  	aa[i].onclick=function(){
      window.open(this.name,'','height=800, width=1033, top=200, left=270,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no');
    }
  }  

}