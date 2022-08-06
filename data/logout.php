<?php 
session_start();
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
}
header("refresh:0;url=index.php");
?>