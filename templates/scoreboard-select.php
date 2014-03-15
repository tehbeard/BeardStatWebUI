<form class="container" action="scoreboards.php" method="get">
	<div class="row">		
		<div class="input-group col-sm-6">
			<select id="scoreboardSelect" class="form-control" name="board" class="form-control">
				<?php 
				while($score->have_scoreboard()){
					?><option value="<?php echo $score->the_scoreboard_id();?>"><?php echo $score->the_scoreboard_title();?></option><?php 
				}
				?>
			</select>
			<span class="input-group-btn"><button class="btn" id="scoreboardGo">View</button></span>
		</div>
	</div>
</form>
<script type="text/javascript">
$(function(){
	$("#scoreboardSelect").select2();
	$("#scoreboardGo").click(function(event){
		location.href = '<?php echo BS_APP_ROOT; ?>scoreboards/' + $("#scoreboardSelect").val();
		return false;
	});
});
</script>
