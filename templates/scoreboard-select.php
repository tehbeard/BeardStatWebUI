<form class="container" action="scoreboards.php" method="get">
	<div class="row">		
		<div class="input-group col-sm-6">
			<select class="form-control" name="board" class="form-control">
				<?php 
				while($score->have_scoreboard()){
					?><option value="<?php echo $score->the_scoreboard_id();?>"><?php echo $score->the_scoreboard_title();?></option><?php 
				}
				?>
			</select>
			<span class="input-group-btn"><button class="btn" type="submit">View</button></span>
		</div>
	</div>
</form>

