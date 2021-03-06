<?php
namespace BeardStat;
/**
 * Represents a stat object
 * @author James
 *
 */
Class SPlayerStat{
 public $domain;
 public $world;
 public $category;
 public $statistic;
 public $value;
 
 function __construct( $domain, $world, $category, $statistic, $value){
  $this->domain = $domain;
  $this->world = $world;
  $this->category = $category;
  $this->statistic = $statistic;
  $this->value = $value;
}
 /**
  * Return formatted value of this stat.
  * @return Ambigous <string, mixed>
  */
 function getValueFormatted(){
  return formatStat($this->statistic,$this->value);
}

}

Class SPlayer{

  public static function findPlayers($playerName){
    global $bs_db;
    $sql = "SELECT `name`,`uuid` FROM " . BS_DB_PREFIX . "_entity WHERE `name` LIKE '%" . $bs_db->real_escape_string($playerName) . "%' and `type`='player'";
    $bs_db->real_query($sql);
    $res = $bs_db->store_result();

    $names = array();
    while($row = $res->fetch_object()){
      $names[] = array(
        "name" =>$row->name,
        "uuid" =>$row->uuid);
    }
    $res->free();
    return $names;
  }

  public static function getFromNameType($name,$type="player"){
    global $bs_db;
    $_name = $bs_db->real_escape_string($name);
    $_type = $bs_db->real_escape_string($type);

    $bs_db->real_query("SELECT `name`,`entityId`,`uuid` FROM `" . BS_DB_PREFIX . "_entity` WHERE `name`='$_name' AND `type`='$_type'"); 
    $res = $bs_db->store_result();
    $row = $res->fetch_assoc();
    $_name = $row["name"];
    $eid = $row["entityId"];
    $_uuid = $row["uuid"];
    $res->free();
    return new SPlayer($eid,$_name,$_uuid);
  }

  public static function getFromUUID($uuid){
    global $bs_db;
    $bs_db->real_query("SELECT `name`,`entityId`,`uuid` FROM `" . BS_DB_PREFIX . "_entity` WHERE `uuid`='$uuid'"); 
    $res = $bs_db->store_result();
    $row = $res->fetch_assoc();
    $_name = $row["name"];
    $eid = $row["entityId"];
    $_uuid = $row["uuid"];
    $res->free();
    return new SPlayer($eid,$_name,$_uuid);
  }

  public $name = "";
  public $type = "";
  public $uuid = "";
  public $data = array();

  private function __construct($entityId,$name) {

    global $bs_db;
    $this->name = $name;


    $sql = <<<SQL
    SELECT
    `domain`,
    `world`,
    `category`,
    `statistic`,
    `value`
    FROM
    `$[PREFIX]_value` as `k`,
    `$[PREFIX]_entity` as `e`,
    `$[PREFIX]_domain` as `d`,
    `$[PREFIX]_world` as `w`,
    `$[PREFIX]_category` as `c`,
    `$[PREFIX]_statistic` as `s`
    WHERE
    `d`.`domainId`    = `k`.`domainId`    AND
    `w`.`worldId`     = `k`.`worldId`     AND
    `c`.`categoryId`  = `k`.`categoryId`  AND
    `s`.`statisticId` = `k`.`statisticId` AND
    `e`.`entityId`    = `k`.`entityId` AND
    `e`.`entityId` = 
SQL;
    $sql .= $entityId;
    $sql = str_replace("$[PREFIX]", BS_DB_PREFIX,$sql);
    $bs_db->real_query($sql);
    $res = $bs_db->store_result();
    if ($res === false) {throw new \Exception("Database Error [{$bs_db->errno}] {$bs_db->error}");}
    while($row = $res->fetch_assoc()){
     $domain = $row['domain'];
   $world = $row['world'];
   $cat = $row['category'];
   $stat = $row['statistic'];
   $value = $row['value'];
   $this->data[$domain][$world][$cat][$stat] = $value;
   }
   $res->free();

   }

 /**
  * Returns an array of stats based on the given elements
  * @param string $domainQry
  * @param string $worldQry
  * @param string $categoryQry
  * @param string $statisticQry
  * @return multitype:SPlayerStat
  */
 function getStats($domainQry='.*',$worldQry='.*',$categoryQry='.*',$statisticQry='.*'){
  //catch nulls to allow any parameter to be passed
 $domainQry = is_null($domainQry) ? '.*' : $domainQry;
 $worldQry = is_null($worldQry) ? '.*' : $worldQry;
 $categoryQry = is_null($categoryQry) ? '.*' : $categoryQry;
 $statisticQry = is_null($statisticQry) ? '.*' : $statisticQry;

 $domainPattern = '/' . $domainQry . '/';
 $worldPattern = '/' . $worldQry . '/';
 $categoryPattern = '/' . $categoryQry . '/';
 $statisticPattern = '/' . $statisticQry . '/';

 $results = array();
 foreach($this->data as $domainId => $domain){
   if(preg_match($domainPattern,$domainId)){
    foreach($domain as $worldId => $world){
     if(preg_match($worldPattern,$worldId)){
      foreach($world as $categoryId => $category){
       if(preg_match($categoryPattern,$categoryId)){
        foreach($category as $statisticId => $value){
         if(preg_match($statisticPattern,$statisticId)){
          $results[] = new SPlayerStat($domainId,$worldId,$categoryId,$statisticId,$value);
        }
        }
        }
        }
        }
        }
        }
        }
        return $results;
        }

 /**
  * Returns a singular object, the result of the array of getStats() sum()'d
  * @param string $domainQry
  * @param string $worldQry
  * @param string $categoryQry
  * @param string $statisticQry
  * @return SPlayerStat
  */
 function getStat($domainQry='.*',$worldQry='.*',$categoryQry='.*',$statisticQry='.*'){
 $res = $this->getStats($domainQry,$worldQry,$categoryQry,$statisticQry);
 $v = new SPlayerStat($domainQry,$worldQry,$categoryQry,$statisticQry,0);
 foreach($res as $r){
   $v->value += $r->value;
 }

 return $v;

 }

 function getHealth(){
 return 0 + @$this->data["default"]["__global__"]["status"]["health"];
 }
 }

 ?>