<?php session_start(); ?>
<?php 

 session_start();
$web=$_POST['web'];

$_SESSION['url']=$web;
echo $_SESSION['url'];

?>