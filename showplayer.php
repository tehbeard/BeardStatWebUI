<?php
ob_start();//Done for search handling auto redirecting
include 'api/api.php';
define('BS_TITLE',"Player stats");
BeardStat\BreadCrumb::addCrumb("Players","showplayer.php");
include 'templates/header.php';

?>
<div class="col-md-8 col-md-offset-2">
<?php

if(!isset($_GET['search']) && ( isset($_GET['playerName']) || isset($_GET['playerUuid']))){
    include 'templates/player-tabs.php';
}
else
{
    include 'templates/player-select.php';
}
?>
</div>
<?php include 'templates/footer.php';?>