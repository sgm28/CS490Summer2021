<style>
	#friends_img {width: 150px; float:left; margin:8px;}
	#friends_bar {background-color: white; min-height: 400px; margin-top: 20px; color: #aaa; padding: 8x;}
	#friends{clear: both; font-size: 16px; font-weight: bold; color: #405d9b}
</style>

<div id="friends">
	<a href="profile.php?id=<?php echo $FRIEND_ROW['usersUid'];?>">
	<img id="friends_img" src="ben-sweet-2LowviVHZ-E-unsplash-1.jpeg">
	<br>
	<?php echo $FRIEND_ROW['usersName']; ?>
	</a>
</div>