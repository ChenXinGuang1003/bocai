          //b=1;
          //function auto(url) {
          //   
          //document.forms[0]["url"+b].value=url
          //alert("2222222222");
          //if(tithism>200)
          //{document.forms[0]["txt"+b].value="链接超时"}
          //else
          //{document.forms[0]["txt"+b].value=tim*10+"ms"}
          //b++
          //}
          
          var Util = {
          tim:1,
          timer:null,
          b:1,
          autourl:null,
          Init:function()
          {
          this.autourl=new Array();
          this.autourl[1]='http://www.yl66y.com/index.php';
          this.autourl[2]='http://www.yl66y.com/index.php';
          this.autourl[3]='http://www.yl66y.com/index.php';
          this.autourl[4]='http://www.yl66y.com/index.php';
          this.autourl[5]='http://www.yl66y.com/index.php';
          this.autourl[6]='http://www.yl66y.com/index.php';
          this.autourl[7]='http://www.yl66y.com/index.php';
          this.autourl[8]='http://www.yl66y.com/index.php';
          this.autourl[9]='http://www.yl66y.com/index.php';
          this.autourl[10]='http://www.yl66y.com/index.php';
          this.autourl[11]='http://www.yl66y.com/index.php';
          },
          butt: function () {
          document.write("<form name=autof><ul class='jiance clearfix'>")
          for(var i=1;i<this.autourl.length;i++)
          document.write("<li class='clearfix'><input class='add' type=text name=url"+i+"><span class='zh'></span><input class='time' type=text name=txt"+i+" value=测试中……><span class='arr'></span><input class='enter' type=button value='点击访问' onclick=window.open(this.form.url"+i+".value)></li>")
          document.write("</ul><div class='inputRe'><input type=submit value='重新检测'></div></form>")
          },
          auto:function(url)
          {
          document.forms["autof"]["url" + this.b].value = url
          
          if(this.tim>200)
          { document.forms["autof"]["txt" + this.b].value = "链接超时" }
          else
          { document.forms["autof"]["txt" + this.b].value = this.tim * 10 + "ms" }
          this.b++;
          var img=event.srcElement; 
          img.onerror=null;

          },
          run:function(){
          for(var i=1;i<this.autourl.length;i++)
              document.write("<img class='no' src=" + this.autourl[i] + "/" + Math.random() + " width=1 height=1 onerror=Util.auto('" + Util.autourl[i] + "') >")
          },
          
          exec:function(){
          this.timer=setInterval("Util.tim++",100);
          this.Init();
          this.butt();
          this.run();
          }
          };
          
          
          Util.exec();
          //Util1.exec();
          
          
