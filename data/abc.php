<?php
header("Content-type:text/html;charset=utf-8");
$username = $_POST['username'];
$json_arr = array("username"=>$username);
$json_obj = json_encode($json_arr);
echo $json_obj;
?>