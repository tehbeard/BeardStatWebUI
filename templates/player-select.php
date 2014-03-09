<?php 
if(!isset($_GET['playerName'])){
echo BeardStat\BreadCrumb::getCrumbs();
?>
<h1>Search players</h1>
<?php 
include 'templates/playerform.html';
}
else {

 //Process form, find matching players;
	$names = BeardStat\SPlayer::findPlayers($_GET['playerName']);
	BeardStat\BreadCrumb::addCrumb("Results","");
	echo BeardStat\BreadCrumb::getCrumbs();
	include 'templates/playerform.html';
	?>
	<h1>
		Search results:
		<?php echo strip_tags($_GET['playerName']); ?>
	</h1>
	<?php

	if(sizeof($names) == 0){
		echo "<span class='label label-danger'>No users found matching that name</span>";
	}
	if(sizeof($names) == 1){
		?>
		<script>
		window.location="showplayer.php?playerUuid=<?php echo $names[0]['uuid'];?>";
		</script>
		<?php die();
	}
	else{

		?>

		<table class="table" style="">
			<?php 
			foreach($names as $name){
				?>
				<tr>

					<td><canvas class="head head-small" data-name="<?php echo $name["name"];?>"></canvas>
					</td>
					<td><a href="showplayer.php?playerUuid=<?php echo $name["uuid"];?>"><?php echo $name["name"];?></name>
					</td>

				</tr>
				<?php } ?>
			</table>
			<?php
		}
	}


	?>