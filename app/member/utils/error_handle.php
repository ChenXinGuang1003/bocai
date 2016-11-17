<?php
function error1($msg)//重新下
{
    echo "<div class=\"match_error\">".$msg."</div>";
    echo "<script>";
    echo "$(\"#post_s\").css(\"display\",\"none\");";
    echo "$(\"#touzhudiv\").css(\"display\",\"block\");";
    echo "waite();";
    echo "clear_input();";
    echo "$(\"#bet_money\").val(\"\");";
    echo "</script>";

    exit;
}

function error2($msg)//关闭
{
    echo "<div class=\"match_error\">".$msg."</div>";
    echo "<script>";
    echo "$(\"#post_s\").css(\"display\",\"none\");";
    echo "$(\"#touzhudiv\").html('');";
    echo "window.clearTimeout(winRedirect);";
    echo "clear_input();";
    echo "$(\"#bet_money\").val(\"\");";
    echo "$(\"#okclose\").css(\"display\",\"none\");";
    echo "$(\"#okbtn\").css(\"display\",\"none\");";
    echo "$(\"#closebtn\").css(\"display\",\"block\");";
    echo "$(\"#cg_num\").html('0');";
    echo "$(\"#cg_msg\").css(\"display\",\"none\");";
    echo "cg_count=0;";
    echo "</script>";

    exit;
}

function msgok($msg,$msg2,$money)//关闭
{
    echo "<div class=\"match_ok\">".$msg."</div>";
    echo "<div class=\"match_ok\">".$msg2."</div>";
    echo "<script>";
    echo "$(\"#post_s\").css(\"display\",\"none\");";
    echo "$(\"#touzhudiv\").html('');";
    echo "window.clearTimeout(winRedirect);";
    echo "clear_input();";
    echo "$(\"#bet_money\").val(\"\");";
    echo "$(\"#okclose\").css(\"display\",\"none\");";
    echo "$(\"#okbtn\").css(\"display\",\"none\");";
    echo "$(\"#closebtn\").css(\"display\",\"block\");";
    echo "$(\"#user_money\").html('".$money."');";
    echo "$(\"#cg_num\").html('0');";
    echo "$(\"#cg_msg\").css(\"display\",\"none\");";
    echo "cg_count=0;";

    echo "</script>";

    exit;
}