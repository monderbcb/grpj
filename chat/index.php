<?php 
session_start();
include('header.php');
?>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<script src="js/chat.js"></script>
<style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;	
}
</style>

<div class="container">		
	<?php if(isset($_SESSION['id']) && $_SESSION['id'] != -1 ) { ?> 	
		<div class="chat">	
			<div id="frame">		
				<div id="sidepanel">
					<div id="profile">
					<?php
					include ('Chat.php');
					$chat = new Chat();
					$loggedUser = $chat->getUserDetails($_SESSION['id']);
					echo '<div class="wrap">';
					$currentSession = '';
				

					 {
						$currentSession = $loggedUser['current_session'];
						echo '<img id="profile-img" src="userpics/'.$loggedUser['avatar'].'" class="online" alt="" />';
						echo  '<p>'.$loggedUser['name'].'</p>';
							echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							echo '<div id="status-options">';
							echo '<ul>';
								echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
								echo '<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>';
								echo '<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>';
								echo '<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>';
							echo '</ul>';
							echo '</div>';
							echo '<div id="expanded">';			
							echo '<a href="logout.php">Logout</a>';
							echo '</div>';
					}
					echo '</div>';
					?>
					</div>
					<div id="search">
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" placeholder="Search contacts..." />					
					</div>
					<div id="contacts">	
					<?php
					if($_SESSION['id'] == 0){
						echo '<ul>';
					$chatUsers = $chat->chatUsers($_SESSION['id']);
					foreach ($chatUsers as $user) {
			
						$status = 'offline';						
						if($user['online']) {
							$status = 'online';
						}
						$activeUser = '';
						if($user['id'] == $currentSession) {
							$activeUser = "active";
						}
						echo '<li id="'.$user['id'].'" class="contact '.$activeUser.'" data-touserid='.$user['id'].' data-tousername="'.$user['name'].'">';
						echo '<div class="wrap">';
						echo '<span id="status_'.$user['id'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="userpics/'.$user['avatar'].'" alt="" />';
						echo '<div class="meta">';
						echo '<p class="name">'.$user['name'].'<span id="unread_'.$user['id'].'" class="unread">'.$chat->getUnreadMessageCount($user['id'], $_SESSION['id']).'</span></p>';
						echo '<p class="preview"><span id="isTyping_'.$user['id'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>'; 
					}
					echo '</ul>';
					}
					?>
					</div>
				</div>			
				<div class="content" id="content"> 
					<div class="contact-profile" id="userSection">	
					<?php
					if ($currentSession != null || $currentSession !="") {
						# code...
					
						$userDetails = $chat->getUserDetails($currentSession);
														
						echo '<img src="userpics/'.$userDetails['avatar'].'" alt="" />';
							echo '<p>'.$userDetails['id'].'</p>';
							echo '<div class="social-media">';
								echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
								echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
								 echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
							echo '</div>';
						
					}
					?>						
					</div>
					<?php
					if($currentSession == null)
					$currentSession = 0;
										echo "Current session = " .  $currentSession;

					?>
					<div class="messages" id="conversation" STYLE="padding-bottom:20px!important;">		
					<?php
					echo $chat->getUserChat($_SESSION['id'], $currentSession);						
					?>
					<br />
					</div>
					<br />
					<div class="message-input" id="replySection">				
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Write your message..." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	<?php } else { 
		header("Location:index.php");	
	 } ?>
	<br>
	<br>	
	
</div>	
<script>
	$(document).keypress(function(e){
    if (e.which == 13){
        $("#chatButton<?php echo $currentSession; ?>").click();
    }
});
</script>