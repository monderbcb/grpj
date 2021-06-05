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
<title>phpzag.com : Demo Push Notification System with PHP & MySQL</title>
<?php include('./container.php');?>
<div class="container">		
	<h2>Example: Build Live Chat System with Ajax, PHP & MySQL</h1>		
	<div class="row">
		<div class="col-sm-4">
			<h4>Chat Login:</h4>		
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
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</form>
			<br>
			<p><b>User</b> : adam<br><b>Password</b> : 123</p>
			<p><b>User</b> : rose<br><b>Password</b> : 123</p>
			<p><b>User</b> : smith<br><b>Password</b>: 123</p>
			<p><b>User</b> : merry<br><b>Password</b>: 123</p>
		</div>
		
	</div>
</div>	
<?php include('./footer.php');?>






