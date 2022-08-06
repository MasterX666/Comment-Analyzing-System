<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Comment Analyzing System</title>
<link href="css/indexstyle.css" rel="stylesheet" type="text/css">
 <!-- fonts -->
 <link href='https://fonts.googleapis.com/css?family=Roboto:400,300italic,500,400italic,700,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
        
        <!-- Linearicons -->
        <link href="vendors/Linearicons/style.css" rel="stylesheet">
        <!-- fontawesome -->
        <link href="vendors/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Select -->
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <!-- Camera Slider -->
        <link href="vendors/camera-slider/css/camera.css" rel="stylesheet">
        <!-- Animate css -->
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        <link href="vendors/animate-css/magic.min.css" rel="stylesheet">

<script type="text/javascript">
 </script>
</head>
<body>
   <div id="container">
       <div id="header">
           <div class="date">
            <script type="text/javascript">
                var d = new Date()
                var t=d.getHours()
                if(t<=11) document.write("早上好，现在是当地时间")
                else if(t>11&&t<=13) document.write("中午好，现在是当地时间")
                else if(t>13&&t<=18) document.write("下午好，现在是当地时间")
                else if(t>18) document.write("晚上好，现在是当地时间") 
                var m=d.getMonth()+1
                 document.write (d.getFullYear()+"年"+m+"月"+d.getDate()+"日，"+t+"点"+d.getMinutes()+"分，星期")
                var da=d.getDay()
                switch(da)
                {
                 case 0:
                   document.write("天")
                   break;
                 case 1:
                   document.write("一")
                   break;
                 case 2:
                   document.write("二")
                   break;
                 case 3:document.write("三") 
                   break;
                 case 4:document.write("四")
                   break;
                 case 5:document.write("五")
                   break;
                 case 6:document.write("六")
                   break;
                }
                </script>                  
               <div class="logsign">
                <?php 
                if (!session_id()) session_start();
                  
                    if(!empty($_SESSION['user']))//你已经赋值的ID
                       { $user=$_SESSION['user'];
                        echo "<a href='user.php'>$user</a> | <a href='logout.php'>注销</a>";//登陆后的处理
                       }
                    else
                        echo '<a href="login-page.html">登录</a> | <a href="Register-page.html">注册</a> ';//未登陆的处理
                ?>   
                             
               </div>
            </div>   
       </div>
        <!--==========Slider Area==========-->
        <section class="main_slider_area row m0">
            <div class="camera_wrap main_slider_inner">
                <div data-thumb="images/home-slider/home-slider-4.jpg" data-src="images/home-slider/home-slider-4.jpg">
                    <div class="container custome_container">
                        <div class="slider_text_main">
                            <div class="slider_text">
                                <h2 class="fadeInUp animated">Comment Analyzing System!</h2>
                                <p class="fadeInUp animated">Comment Analyzing System is a new and effective way of collecting and analyzing customers' comments. Among the entire methods billboard advertising is</p>
                                <h3 class="fadeInUp animated">Free</h3>
                                <a class="slider_btn fadeInLeft animated" href="login-page.html"><i class="lnr lnr-cart"></i> Add To Join in!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-thumb="images/home-slider/home-slider-1.jpg" data-src="images/home-slider/home-slider-1.jpg">
                    <div class="container custome_container">
                        <div class="slider_text_main">
                            <div class="slider_text">
                                <h2 class="fadeInUp animated">Comment Analyzing System!</h2>
                                <p class="fadeInUp animated">Comment Analyzing System is a new and effective way of collecting and analyzing customers' comments. Among the entire methods billboard advertising is</p>
                                <h3 class="fadeInUp animated">Free</h3>
                                <a class="slider_btn fadeInLeft animated" href="login-page.html"><i class="lnr lnr-cart"></i> Add To Join in!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========End Slider area==========-->
       <div id="logo">

            <div class="logan">
                <img src="images/slogan.png" width="800" height="80" >
            </div>
       </div>
       <script type="text/javascript">
            function search(){
            var cont = $("input").serialize();
            var name;
            var web;
            var num=0;
            $.ajax({
                url:'abc.php',
                type:'post',
                async: false,
                dataType:'json',
                data:cont,
                success:function(data){
                name=data.username;
                console.log(name);
                }
            });

            $.ajax({
                        type: "post",
                        url: "http://mxlxpsylab.cn:8099/getPdata",
                        async: false,
                        dataType: "json",
                        data:{id:0},
                        success: function(res){ 
                            l=res.length
                            var s
                            console.log("name"+name)
                            
                            for(var i=0;i<l;i++)
                            {
                            var s=$.parseJSON(res[i].pdatajson)
                            if(s.ptitle.indexOf(name)!=-1) 
                                {
                                  num=1;
                                  break;
                                 } 
                            }
                            
                            console.log(s)        
                            web= JSON.stringify(s)
                            console.log(web)
                            console.log(typeof(web))
                           
                        }
                        
                    });
                
                
                $.ajax({ 
                    url: 'insert.php',
                    type: 'post',
                    async: false,
                    data:{"web":web}, 
                    dataType: "",
                    success: function()
                    {
                    if(num==0){
                                alert("您所输入的内容目前还没有最佳匹配项，您可以登陆后在用户页面提交相关网址，我们会尽快安排。"); 
                                window.location.href = "index.php";	
                            }
                            else{	
                    window.location.href = "paper.php";}													  
                                }});


            return false;

            };
        </script>
       <div id="search">
        <form id="typeinsearch" action="" method="post" onsubmit="return search()">
          <div class="sbox">
          <input  type="text" class="sson" name="username" placeholder="Type a URL and Search" >
          <input type="hidden" name="web"/>  
        </div>
        </form>
       </div>
       <div id="main">
           <div id="aside"></div>
           <div id="content">
                <ul>
                        <li><a id="navcom" href="#home">推荐</a></li>
                        <li><a id="navweb" href="#news">导航</a></li>
                </ul>
                <script>
                  document.getElementById("navcom").onclick=function(){displaynav1()};
                  document.getElementById("navweb").onclick=function(){displaynav2()};
                  function displaynav1(){
                    var s1=document.getElementById("nav1");
                    var p1=document.getElementById("navcom");
                    var s2=document.getElementById("nav2");
                    var p2=document.getElementById("navweb");
                    s1.style.visibility="visible";
                    p1.style.backgroundColor="#888";
                    p1.style.color="white";
                    p1.style.fontWeight=600;
                    s2.style.visibility="hidden";
                    p2.style.backgroundColor="white";
                    p2.style.color="black";
                    p2.style.fontWeight=400;
                   }
                   function displaynav2(){
                    var s1=document.getElementById("nav1");
                    var p1=document.getElementById("navcom");
                    var s2=document.getElementById("nav2");
                    var p2=document.getElementById("navweb");
                    s1.style.visibility="hidden";
                    p1.style.backgroundColor="white";
                    p1.style.color="black";
                    p1.style.fontWeight=400;
                    s2.style.visibility="visible";
                    p2.style.backgroundColor="#888";
                    p2.style.color="white";
                    p2.style.fontWeight=600;
                   }
                </script>
                <div id="commend">
                <div id="nav1">
                    <div class="hot">近期热点</div>
                    <a class="hot-page 1" href="paper2.html">吴奇隆为刘诗诗庆生</a>
                    <a class="hot-page 2" href="paper3.html">六岁女童家中着火独自报警</a>
                    <a class="hot-page 3" href="paper4.html">中美“贸易战”持续升温</a>
                    <a class="hot-page 4" href="paper5.html">青少年学业压力大引起关注</a>
                </div>
                <div id="nav2">
                    <div class="nav-sina">
                        <a href="https://www.sina.com.cn/" target="_blank" title="新浪网">
                         <img src="images/sina.jpg">
                       </a>
                    </div>
                    <div class="nav-tencent">
                        <a href="https://www.qq.com/" target="_blank" title="腾讯网">
                          <img src="images/tencent.jpg">
                        </a>
                    </div>
                    <div class="nav-weibo">
                       <a href="https://weibo.com/" target="_blank" title="新浪微博">
                        <img src="images/weibo.jpg">
                       </a>
                    </div>
                    <div class="nav-netease">
                        <a href="https://www.163.com/" target="_blank" title="网易">
                         <img src="images/netease.jpg">
                        </a>
                    </div>
                    <div class="nav-dazhong">
                       <a href="http://www.dianping.com/" target="_blank" title="大众点评">
                        <img src="images/dazhong.jpg">
                       </a>
                    </div>
                    <div class="nav-renmin">
                         <a href="http://www.people.com.cn/" target="_blank" title="人民网">
                            <img src="images/renmin.jpg">
                        </a>
                    </div>
                     <div class="nav-xinhua">
                         <a href="http://www.xinhuanet.com/" target="_blank" title="新华网">
                            <img src="images/xinhua.jpg">
                        </a>
                     </div>
                     <div class="nav-chinadaily">
                        <a href="http://www.chinadaily.com.cn/" target="_blank" title="中国日报">
                            <img src="images/chinadaily.jpg">
                        </a>
                     </div>
                </div>
                </div>
           </div>
       </div>
       <!--==========Home Feature area==========-->
       <section class="home_product_feature">
            <div class="container custome_container">
                <div class="home_feature_inner row m0">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="home_feature_inner_content">
                                <img src="images/icon/home-feature-icon-1.png" alt="">
                                <h4>Quick Analyzing</h4>
                                <p>The Comments sented to us will be analyzed at first time.With marvelous Machine Learning model, you'll get the result at the first time</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="home_feature_inner_content">
                                <img src="images/icon/home-feature-icon-2.png" alt="">
                                <h4>24/7  Service</h4>
                                <p>You can use the System whenever and wherever you want,also you can analyze any websites as long as we support</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="home_feature_inner_content">
                                <img src="images/icon/home-feature-icon-3.png" alt="">
                                <h4>Safe and Free</h4>
                                <p>The whole process is total free for anyone.While using our model the security safe can be guaranteed.Don't worry about it</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="home_feature_inner_content">
                                <img src="images/icon/home-feature-icon-4.png" alt="">
                                <h4>Websites Support</h4>
                                <p>Weibo、blog、twitter……more and more websites will be supported to be used in Comment Analyzing System.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==========End Home Feature area==========-->
       <div id="footer">
           Copyright &copy; 2017. All rights reserved.
       </div>
   </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-1.12.3.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap Select -->
        <script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <script src="vendors/wow/wow.min.js"></script>
        <!-- Camera Slider -->
        <script src="vendors/camera-slider/js/camera.min.js"></script>
        
        <script src="js/theme.js"></script>

</body>
</html>
