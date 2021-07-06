<?php 
SESSION_START();
include('./header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include ('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['email'], $_POST['pwd']);	
	if(!empty($user)) {
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['id'] = $user[0]['id'];
		$chat->updateUserOnline($user[0]['id'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['id']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location:index.php");
	} else {
		$loginError = "Invalid username or password!";
	}
}

?>
<title>تسجيل الدخول</title>
<?php include('./container.php');?>
<div class="container">		
	<h2>المحادثات الحية</h1>		
	<div class="row">
		<div class="col-sm-4">
			<h4>تسجيل الدخول لنظام المحادثة:</h4>		
			<form method="post">
				<div class="form-group">
				<?php if ($loginError ) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="email">User:</label>
					<input type="username" class="form-control" name="email" required>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pwd" required>
				</div>  
				<button type="submit" name="login" class="btn btn-info">تسجيل الدخول</button>
			</form>
			<br>
		</div>
		
	</div>
</div>	
<?php include('./footer.php');?>






