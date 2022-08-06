<?php
header("Content-type:text/html;charset=utf-8");
$username = $_POST['username'];
$web=$_POST['web'];
$json_arr = array("username"=>$username,"web"=>$web);
$json_obj = json_encode($json_arr);
echo $json_obj;
//echo "<script type='text/javascript'>console($json_arr);</script>";

?>