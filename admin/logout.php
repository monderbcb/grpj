<?php
include("dbconnection.php");
session_start();
$sqlUserUpdate = "
			UPDATE user 
			SET online = 0 
			WHERE id = 0";			
		mysqli_query($con, $sqlUserUpdate);	
$_SESSION['username'] = "";
$_SESSION['id']  = "";
$_SESSION['login_details_id']= "";
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="index.php";
</script>
