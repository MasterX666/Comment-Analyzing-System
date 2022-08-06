<?php session_start(); ?>
<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作
    if (!session_id()) session_start();
    $name=$_SESSION['user'];//post获取表单里的name
    $password=$_POST['web'];//post获取表单里的password
    include('testsql.php');//链接数据库
   
    if(!$name || !$password)
    {
        echo "<script type='text/javascript'>alert('表单填写不完整！');</script>";
        header("refresh:0;url=Request-page.html");//如果成功跳转至welcome.html页面
    }
    else{
     $q="insert into request(username,web) values ('$name','$password')";//向数据库插入表单传来的值的sql
     $reslut=mysql_query($q,$con);//执行sql
    
     if (!$reslut){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误
     }else{
        echo "<script>alert('提交成功，我们会尽快完成报告页面！');</script>";//成功输出注册成功
        header("refresh:0;url=user.php");//如果成功跳转至welcome.html页面
        exit;
     }
    }
    

    mysql_close($con);//关闭数据库

?>