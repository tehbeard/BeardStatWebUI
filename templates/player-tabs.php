<?php 
$p = null;
if(isset($_GET['playerName'])){
  $p = BeardStat\SPlayer::getFromNameType($_GET['playerName']);
}
if(isset($_GET['playerUuid'])){
  $p = BeardStat\SPlayer::getFromUUID($_GET['playerUuid']);
}


BeardStat\BreadCrumb::addCrumb($p->name, BS_CFG_STABLE_LINKS ? (BS_APP_ROOT . "player/uuid/" . $p->uuid) : (BS_APP_ROOT . "player/" . $p->name) );

BeardStat\BreadCrumb::addCrumb("Record","");
echo BeardStat\BreadCrumb::getCrumbs();
include 'templates/playerform.html';
$tabs = new BeardStat\StatTabs(BEARDSTAT_API_DIR . "../config/tabs.json");
?>
<div class="tab-stats col-md-12">
  <div style="float: left;">
   <h2>
    <canvas class="head head-huge" data-name="<?php echo $p->name;?>"></canvas>
    <?php echo $p->name; ?>
  </h2>
  <?php
	//Health of player
  $h = $p->getHealth();
  $health = $h;
  while($health > 0){
    if($health >= 2){
      echo "<img src=\"" . BS_APP_ROOT . "/img/Heart.svg\" class=\"heart\">";
    }
    else if($health == 1){
      echo "<img src=\"" . BS_APP_ROOT . "/img/Half_Heart.svg\" class=\"heart\">";
    }
    $health -= 2;
  }
  $ahealth = 20 - $h;
  while($ahealth > 0){
    if($ahealth >= 2){
      echo "<img src=\"" . BS_APP_ROOT . "/img/Empty_Heart.svg\" class=\"heart\">";
    }
    $ahealth -=2;
  }
  ?>
</div>
<div style="clear:both"></div>
<ul class="nav nav-tabs">
  <?php 
		//Print headings
  $firstTab = true;
  while($tabs->have_tabs()){
   $id = $tabs->the_tab_id();
   $name = $tabs->the_tab_name();
   ?>
   <li class="<?php echo ($firstTab ? "active":"") ?>"><a
     href="#<?php echo $id;?>" data-toggle="tab"><?php echo $name;?> </a>
   </li>
   <?php
   $firstTab = false;
 }
 ?>
</ul>
<div class="tab-content">
  <?php
  $tabs->reset_tabs();
  $dump = "";
  $firstTab = true;
  while($tabs->have_tabs()){
    $id = $tabs->the_tab_id();
    $name = $tabs->the_tab_name();

  $dump .= "Making tab $id:$name\n";//DUMP


  echo "<div id=\"$id\" class=\"tab-pane fade " . ($firstTab ? "active in":"") . "\">";
  if($firstTab){
    $firstTab=false;
  }

  echo "<table class=\"table table-bordered\">";
  while($tabs->have_headings()){

    echo"<tr><td colspan=\"2\"><h3>" . $tabs->the_heading_name() ."</h3></td></tr>";
  $dump .= "  Making heading " . $tabs->the_heading_name() . "\n";//DUMP
  while($tabs->have_entries()){
   $dump .= "    Making entry " . $tabs->the_entry_label() . "\n";//DUMP
   echo "<tr><td>" . $tabs->the_entry_label() . "</td><td>" . $tabs->the_entry_value_for_player($p)->getValueFormatted() . "</td></tr>";
 }
 $tabs->reset_entries();

}
$tabs->reset_headings();
echo "</table></div>";
}
$tabs->reset_tabs();
?>
</div>
</div>
