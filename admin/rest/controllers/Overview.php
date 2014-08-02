<?php
namespace RestAPI;
class Overview {
  public function respond(){
    global $bs_db;
    $playerCount = $bs_db->query("SELECT COUNT(*) FROM `" . BS_DB_PREFIX . "_entity` WHERE `type`='player'")->fetch_array();
    return array("playerCount"=>$playerCount[0]);
  }
}