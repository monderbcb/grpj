<?php 
SESSION_START();
include ('Chat.php');
$chat = new Chat();
$chat->updateUserOnline($_SESSION['id'], 0);
$_SESSION['username'] = "";
$_SESSION['id']  = "";
$_SESSION['login_details_id']= "";
header("Location:index.php");
?>






