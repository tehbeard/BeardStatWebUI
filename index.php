<?php 
include 'api/api.php';
define('BS_TITLE', "Main page");
include 'templates/header.php';

?>

<div class="jumbotron">
<h1>Search players</h1>
  <p>Find your friends and enemies<img src="img/Heart.svg" style="width:16px;height:32px;image-scale:cover;"></p>
	<?php include 'templates/playerform.html'; ?>
</div>

<div class="jumbotron">
<h1>Scoreboards</h1>
<p>Find out who's got too much time to play, and who's most likely to fall of a ledge.</p>
<?php 
$score = new BeardStat\SScoreboard('config/scoreboards.json');
include 'templates/scoreboard-select.php';
?>
</div>

<?php include 'templates/footer.php';?>