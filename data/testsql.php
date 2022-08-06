<?php
   header("Content-type:text/html;charset=utf-8");
   $server="masterx.top:3306";//主机
    $db_username="root";//你的数据库用户名
    $db_password="991008";//你的数据库密码

    $con = mysql_connect($server,$db_username,$db_password);//链接数据库

   
   if (!$con) {
   
       die('Could not connect: ' . mysql_error());
   
   }else{
   
       echo 'Connected successfully';
   
   }
   mysql_query("set names 'utf8'");
   mysql_select_db('test',$con);//选择数据库（我的是test）
?>