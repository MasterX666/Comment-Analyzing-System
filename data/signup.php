<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作

    $name=$_POST['name'];//post获取表单里的name
    $password=$_POST['password'];//post获取表单里的password
    include('connect.php');//链接数据库
    $sql = "select * from user where username = '$name'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num!=0){
        echo "<script type='text/javascript'>alert('用户名已被注册！');</script>";
        header("refresh:0;url=Register-page.html");//如果成功跳转至welcome.html页面
    }
    else if(!$name || !$password)
    {
        echo "<script type='text/javascript'>alert('表单填写不完整！');</script>";
        header("refresh:0;url=Register-page.html");//如果成功跳转至welcome.html页面
    }
    else{
     $q="insert into user(id,username,password) values (null,'$name','$password')";//向数据库插入表单传来的值的sql
     $reslut=mysql_query($q,$con);//执行sql
    
     if (!$reslut){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误
     }else{
        echo "<script>alert('注册成功');</script>";//成功输出注册成功
        header("refresh:0;url=login-page.html");//如果成功跳转至welcome.html页面
        exit;
     }
    }
    

    mysql_close($con);//关闭数据库

?>