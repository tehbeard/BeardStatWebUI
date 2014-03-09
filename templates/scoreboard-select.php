<form class="container" action="scoreboards.php" method="get" id="scoreboardForm">
	<div class="row">		
		<div class=" col-sm-6">
			<select id="scoreboardSelect" name="board" class="form-control">
				<?php 
				while($score->have_scoreboard()){
					?><option value="<?php echo $score->the_scoreboard_id();?>"><?php echo $score->the_scoreboard_title();?></option><?php 
				}
				?>
			</select>
		</div>
	</div>
</form>
<script type="text/javascript">
$(function(){
	$("#scoreboardSelect").select2();
	$("#scoreboardSelect").change(function(event){
		location.href = '<?php echo BS_APP_ROOT; ?>scoreboards/' + $("#scoreboardSelect").val();
		return false;
	});
});
</script>
