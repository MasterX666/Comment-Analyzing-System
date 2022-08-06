<?PHP
   header("Content-Type: text/html; charset=utf8");
  
   include('connect_S.php');//链接数据库
   $name = $_POST['weibo'];//post获得用户名表单值
   


   if ($name){
    $sql = "select * from searched where searchname = '$name'";
    $result = mysql_query($sql);//执行sql
    $rows=mysql_num_rows($result);//返回一个数值
    
    
    if($rows){
        $row = mysql_fetch_assoc($result);
        $s=$row['link'];
        header("refresh:0;url=$s");//如果成功跳转至welcome.html页面
        exit;
    }
    else{
        echo "<script type='text/javascript'>alert('查询无果！');</script>";
        header("refresh:0;url=index.php");//如果成功跳转至welcome.html页面
     }
   }
   mysql_close();
?>