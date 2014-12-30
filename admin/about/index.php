<?php 
require '../bootstrap.php';
check_auth();
define('BS_TITLE', "About");
require("../partials/header.php"); 
?>
<div class="container">
  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right">
      <h3>BeardStat Web UI v1.0</h3>
      <p>Customisable Web UI for BeardStat plugin for Bukkit/Spigot/Sponge servers.</p>
      <p>For plugin version: 0.8.1+</p>
    </div>
  </div>
</div>
<?php require("../partials/scripts.php"); ?>
<?php require("../partials/footer.php"); ?>