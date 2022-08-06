<?php session_start(); ?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function search(){
   var cont = $("input").serialize();
   var name;
   var web;
   $.ajax({
    url:'abc.php',
    type:'post',
    async: false,
    dataType:'json',
    data:cont,
    success:function(data){
    name=data.username;
    console.log(name);
     //var str = data.username + data.age + data.job;
     //$("#result").html(str);
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
                     break; 
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
           window.location.href = "paper6.php";													  
					}});


 return false;

};
 $(function(){
  $("#send").click(function(){
   var cont = $("input").serialize();
   var name;
    
   $.ajax({
    url:'abc.php',
    type:'post',
    async: false,
    dataType:'json',
    data:cont,
    success:function(data){
    name=data.job;
    alert(name);
     var str = data.username + data.age + data.job;
     $("#result").html(str);
     //if(data.age==24) window.location.href = "paper6.php";
    }
   });
  }); 
 });



</script>
</head>
<body>
<div id="result">一会看显示结果</div>
 <form id="my" action="" method="post" onsubmit="return search()">
  <p><span>姓名：</span><input type="text" name="username" /></p>
  <input type="hidden" name="web"/>
 </form>
 <button id="send">提交</button>
</body>
</html>