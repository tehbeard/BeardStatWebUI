<?php
include 'api/api.php';
define('BS_TITLE', "Scoreboards");
include 'templates/header.php';

$score = new SScoreboard('config/scoreboards.json'); 
if(isset($_GET['board'])){
$score->load($_GET['board']);
?>
<div class="span8 offset2" style="background-color: #FAFAFA">

<div style="float:left"><h1><?php echo $score->the_title(); ?></h1></div><div style="float:right;margin-top:20px;margin-right:20px;margin-bottom:0px;"><?php include 'templates/scoreboard-select.php';?></div>
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
?><tr><td><canvas class="head" data-name="<?php echo $score->the_player_name(); ?>"></canvas></td><td><?php echo $score->the_rank(); ?></td><td><a href="showplayer.php?playerName=<?php echo $score->the_player_name(); ?>"><?php echo $score->the_player_name(); ?></a></td><?php 
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
?>
<div class="span6 offset2">
<h1>Scoreboards</h1>
<?php include 'templates/scoreboard-select.php';?>
</div>
<?php };include 'templates/footer.php';?>