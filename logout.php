<?php
include("dbconnection.php");
session_start();
$sqlUserUpdate = "
			UPDATE user 
			SET online = 0 
			WHERE id = '".$_SESSION['id']."'";			
		mysqli_query($con, $sqlUserUpdate);	
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>
