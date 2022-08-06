<?php
    $server="masterx.top:3306";//主机
    $db_username="newuser";//你的数据库用户名
    $db_password="66666666";//你的数据库密码

    $con = mysql_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect".mysql_error());//如果链接失败输出错误
    }
    
    mysql_query("set names 'utf8'");
    mysql_select_db('test',$con);//选择数据库（我的是test）
?>