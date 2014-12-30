<?php 
require 'bootstrap.php';
check_auth();
require("partials/header.php"); 

global $bs_db;
    $playerCount = $bs_db->query("SELECT COUNT(*) FROM `" . BS_DB_PREFIX . "_entity` WHERE `type`='player'")->fetch_array()[0];

    $worldCount = $bs_db->query("SELECT COUNT(*) FROM `" . BS_DB_PREFIX . "_world`")->fetch_array()[0];
    
    $timeCount = $bs_db->query("SELECT SUM(`value`)
    FROM " . BS_DB_PREFIX . "_value as v
    JOIN " . BS_DB_PREFIX . "_statistic as s ON s.statisticId = v.statisticId AND s.statistic ='playedfor'
    JOIN " . BS_DB_PREFIX . "_category as c ON c.categoryId = v.categoryId AND c.category ='stats'")->fetch_array()[0];

    $blockCount = $bs_db->query("SELECT SUM(`value`)
    FROM " . BS_DB_PREFIX . "_value as v
    JOIN " . BS_DB_PREFIX . "_statistic as s ON s.statisticId = v.statisticId AND s.statistic ='totalblockdestroy'")->fetch_array()[0];

?>
<div class="container">
<h1>Home</h1>
<p>
Tracking <strong><?= $playerCount;?></strong> players across <strong><?= $worldCount;?></strong> worlds.<br/>
They have played a total of <?= gettimeformat($timeCount);?>.<br/>
In that time, they have mined <strong><?= number_format($blockCount); ?></strong> blocks.
</p>
</div>
<?php require("partials/scripts.php"); ?>
<?php require("partials/footer.php"); ?>