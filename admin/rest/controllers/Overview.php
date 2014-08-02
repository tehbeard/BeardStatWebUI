<?php
namespace RestAPI;
class Overview {
  public function respond(){
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

    return array(
      "playerCount"=>$playerCount,
      "worldCount"=>$worldCount,
      "totalTime"=>gettimeformat($timeCount),
      "blocksMined"=>$blockCount
      );
  }
}

