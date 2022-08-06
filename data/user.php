<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Center</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a id="title" href="index.php"></a>
            <span id="time"></span>
        </div>
        <div class="info-container">
            <img src="./images/default-thumb.png">
            <span>
            <?php 
                  if (!session_id()) session_start();
                  $user=$_SESSION['user'];
                   

                        echo " 欢迎您,<span id='username'>$user</span>";//登陆后的处理
                    
                ?>   
            </span>
         </div>
         <div class="record-container">
            <div class="title">搜索记录</div>
            <a class="record" href="paper2.html">吴奇隆为刘诗诗庆生</a>
            <div class="record">全球变暖问题持续引起关注</div>
            <a class="record" href="paper4.html">中美“贸易战”持续升温</a>
            <a class="record" href="paper5.html">青少年学业压力大引起关注</a>
            <a class="record" href="paper3.html">六岁女童家中着火独自报警</a>
            <a   class="record" href="Request-page.html">提交新的网址</a>
         </div>
    </div>
</body>
</html>

<script>
    const title = $("#title"),
          time = $("#time");
    
   
    title.text('返回主页');
    let now = new Date();
    let now_time = '北京时间:' + now.getFullYear() + '年' + (now.getMonth() + 1) + '月' + now.getDate() + '日 ' + now.getHours() + ':' + now.getMinutes();
    time.text(now_time);
    setInterval(()=>{
        let now = new Date();
        let now_time = '北京时间:' + now.getFullYear() + '年' + (now.getMonth() + 1) + '月' + now.getDate() + '日 ' + now.getHours() + ':' + now.getMinutes();
        time.text(now_time);
    },60000)
 
</script>
