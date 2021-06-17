<!--<style>
	/*.user_img {width: 150px; float:left; margin:8px;}
	.user_bar {background-color: white; min-height: 400px; margin-top: 20px; color: #aaa; padding: 8x;}
	.user {clear: both; font-size: 16px; font-weight: bold; color: #405d9b}*/
</style>-->

<div class="user">
	<a href="profile.php?id=<?php echo $FRIEND_ROW['usersUid'];?>">
		<!--<img class="user_img" src="ben-sweet-2LowviVHZ-E-unsplash-1.jpeg">-->
		<div class="pfp-wrap">
			<div class="pfp"></div>
		</div>
		<div class="user-name">
			<?php echo $FRIEND_ROW['usersName']; ?>
		</div>
	</a>
</div>
