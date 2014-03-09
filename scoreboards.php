<?php
include 'api/api.php';
define('BS_TITLE', "Scoreboards");

BeardStat\BreadCrumb::addCrumb("Scoreboards","scoreboards.php");
include 'templates/header.php';

$score = new BeardStat\SScoreboard('config/scoreboards.json'); 
if(isset($_GET['board'])){
	$score->load($_GET['board']);

	
	BeardStat\BreadCrumb::addCrumb($score->the_title(),"scopeboards.php?={$_GET['board']}");
	echo BeardStat\BreadCrumb::getCrumbs();
	?>
	<h1><?php echo $score->the_title(); ?></h1>
	<h4><?php echo $score->the_description(); ?></h4>
	<?php include 'templates/scoreboard-select.php';?>
	<br/>
	<table class="table">
		<tr><th></th><th>Rank</th><th>Player</th>
			<?php 
			while($score->have_field()){
				echo "<th>" . $score->the_field_name() . "</th>";
			}
			$score->reset_field();
			?></tr>
			<?php 
			while($score->have_entry()){
				?><tr><td><canvas class="head" data-name="<?php echo $score->the_player_name(); ?>"></canvas></td><td><?php echo $score->the_rank(); ?></td><td><a href="showplayer.php?playerUuid=<?php echo $score->the_player_uuid(); ?>"><?php echo $score->the_player_name(); ?></a></td><?php 
				while($score->have_field()){
					echo "<td class=\"" . $score->the_field_name() . "\">" . $score->the_field_value() . "</td>"; 
				} 
				echo "</tr>";
				$score->reset_field();
			}
			?>
		</table>
		<?php 
	}
	else
	{
		
		echo BeardStat\BreadCrumb::getCrumbs();
		include 'templates/scoreboard-select.php';
	};
	include 'templates/footer.php';?>