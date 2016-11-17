<?php
session_start();
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
@include_once($C_Patch."/app/member/class/user.php");

$uid = $_SESSION['userid'];
$display	=	'block';
if(!intval($_COOKIE['f'])) $display	= 'none';

$sql = "select live_username,live_password from live_user where live_type='TYC' and user_id='$uid'";
$query	=	$mysqli->query($sql);
$row    =	$query->fetch_array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$web_site['web_name']?></title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <style>
        .fontcolor{float: left;
            background: url(images/yes.jpg) no-repeat left;
            line-height: 25px;
            width: 360px;
            padding: 0 0 0 26px;
            height: 25px;
            color: #000;}

        .zhuce_03 {
            float: left;
            background: url(images/no.jpg) no-repeat left;
            line-height: 25px;
            width: 360px;
            padding: 0 0 0 26px;
            height: 25px;
            color: #000;
        }



    </style>
</head>
<script language="javascript">
    if(self==top){
        top.location='/index.php';
    }

</script>

<script language="javascript" src="/js/jquery-1.7.1.js"></script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<script language="javascript" src="/js/top.js"></script>
<script language="javascript" src="/cl/js/common.js"></script>
<link href="/member/zhenren/newindex/standard.css?_=171" rel="stylesheet" type="text/css" />

<link href="/member/zhenren/newindex/haier.css" rel="stylesheet" type="text/css">
<body id="zhuce_body">
<div id="bg_000">
    <div id="zhuce_top" style="width: 1024px;">
        <style type="text/css">
            #game_classify
            {
                width:960px;
                height:auto;
                margin:0px auto;
            }
            .icon_title
            {
                float:left;
                width:100%;
                height:28px;
                color:#FFCC99;
                font-size:16px;
                font-weight:bold;
            }
            .icon_line
            {
                float:left;
                width:100%;
                height:24px;
                color:#ffffff;
                font-size:14px;
                font-weight:bold;
            }
            .icon_line a
            {
                color:#ff0000;
                text-decoration:under-line;
            }
        </style>
        <script type="text/javascript">
            function zhuanhuan()
            {
                var myuid = '<?=$uid?>';
                if(!myuid || myuid<=0)
                {
                    alert('请先登录！');
                    return false;
                }
                else
                {
                    f_com.MGetPager('MACenterView','moneyView');
                    return false;
                }
            }
            $(window.parent.parent.document).find("#mainFrame").height(620);
        </script>
        <div style="display:none;">
            <?php
            $userinfo=user::getinfo($uid);
            ?>
            <form name="loginlive" id="loginlive" action="speed_tyc.php" method="post" target="mainFrame">
                <input name="username" id="username" value="<?=$userinfo['user_name']?>" />
                <input name="password" id="password" value="<?=$userinfo['user_pass']?>" />
                <input name="username_ag" id="username_ag" type="hidden" value="<?=$row['live_username']?>" />
                <input name="password_ag" id="password_ag" type="hidden" value="<?=$row['live_password']?>" />
                <form>
                    <script type="text/javascript">
                        function submitlive()
                        {
                            if ($("#username").val()=="" || $("#password").val()=="")
                            {
								alert("您还没有加入真人娱乐!\r\n充值后自动加入.");
//                                window.open("http://aglive.bbin-game.com/Default.aspx","mainFrame");
                                return false;
                            }else{
                                loginlive.submit();
                                return true;
                            }
                        }
                    </script>
        </div>
        <div id="game_classify">
            <ul>
                <li class="icon_title">温馨提示：</li>
                <li class="icon_line">1、<?=$web_site['web_name']?>正式开通三公、牛牛、色碟、百家乐、龙虎斗、轮盘、骰宝等真人娱乐</li>
                <li class="icon_line">2、进入真人娱乐前请先进行额度转换，点击 <a href="javascript:void(0);" onclick="zhuanhuan()" title="额度转换">额度转换</a> 选择【主账户->太阳城】马上转换额度</li>
                <li class="icon_line">3、真人账号为:<span style="color: red;"><?=$row['live_username']?$row['live_username']:"(暂时没有真人账号)"?></span>，统一密码为:<span style="color: red;">bb123789</span>，登陆后请重新修改！</li>
                <li class="icon_line">4、如有其它疑问，也可直接联系24小时在线客服进行咨询</li>
            </ul>
        </div>
        <div class="clear"></div>
        <div id="area-1" class="game-list clearfix" style="padding-left: 0px;">
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3005_1.png" alt="三公" width="130" height="90" title="三公" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="三公">三公</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/sg.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3012_1.png" alt="牛牛" width="130" height="90" title="牛牛" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="牛牛">牛牛</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/nn.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3011_1.png" alt="色碟" width="130" height="90" title="色碟" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="色碟">色碟</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/sd.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>


            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/Game_3001_1.png" alt="百家乐" width="130" height="90" title="百家乐" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="百家乐">百家乐</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/bjl.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/Game_3007_1.png" alt="轮盘" width="130" height="90" title="轮盘" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="轮盘">轮盘</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/lp.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3008_1.png" alt="骰宝" width="130" height="90" title="骰宝" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="骰宝">骰宝</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/sb.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>


            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3006_1.png" alt="温州牌九" width="130" height="90" title="温州牌九" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="温州牌九">温州牌九</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/wzpj.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3003_1.png" alt="龙虎斗" width="130" height="90" title="龙虎斗" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="龙虎斗">龙虎斗</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/lhd.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
            <div class="game-item pngfix">
                <a href="javascript:void(0);" onclick="return submitlive();" class="game-img">
                    <img src="/member/zhenren/newindex/tyc/Game_3002_1.png" alt="二八杠" width="130" height="90" title="二八杠" class="pngfix" />
                </a>
                <div class="clear"></div>
                <h4 class="game-name" title="二八杠">二八杠</h4>
                <div class="game-link">
                    <a href="/member/zhenren/rule/ebg.php" target="_blank" class="rule pngfix">规则说明</a>
                    <a href="javascript:void(0);" onclick="return submitlive();" class="rule pngfix">开始投注</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</body>
</html>