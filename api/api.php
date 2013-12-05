<?php
/**
API file for beardstat web API.
*/
define("BEARDSTAT_API_DIR", dirname(__FILE__) . "/");
(@include BEARDSTAT_API_DIR . 'config.php') or die("<h1>No API config found!</h1>");
$bs_db = new mysqli(BS_DB_HOST,BS_DB_USER,BS_DB_PASS,BS_DB_DB,BS_DB_PORT);
if($bs_db->connect_errno > 0){
    die('Unable to connect to database [' . $bs_db->connect_error . ']');
}

/**
 * grab all data from a table, used for local lookup
 * @param string $element
 * @param string $key
 * @return multitype:
 */
function getLookup($element,$key){
 global $bs_db;
 $e = $bs_db->real_escape_string($element);
 $bs_db->real_query("SELECT * FROM " . BS_DB_PREFIX . "_" . $e);
 $res = $bs_db->store_result();

 if ($res === false) {throw new Exception("Database Error [{$bs_db->errno}] {$bs_db->error}");}
 $a = array();
 while($r = $res->fetch_assoc()){
  $a[$r[$key]]=$r;
 }
 $res->free();
 return $a;
}

include_once BEARDSTAT_API_DIR . 'formating.php';
include_once BEARDSTAT_API_DIR . 'player.class.php';
include_once BEARDSTAT_API_DIR . 'scoreboard.class.php';
include_once BEARDSTAT_API_DIR . 'tabs.class.php';
include_once BEARDSTAT_API_DIR . 'json.lib.php';

/*$bs_db->real_query("SELECT DISTINCT(name) FROM " . BS_DB_PREFIX . "_entity;");
$res = $bs_db->store_result();
echo $res->num_rows . "<hr>";
while($row = $res->fetch_assoc()){
  echo $row['name'] . "<br>";
}*/

/**
 * Return value of array (used to bypass func()[x] issue
 * @param unknown $array
 * @param unknown $key
 * @return unknown
 */
function array_value($array, $key) {
 return $array[$key];
}
/**
 * Search associative array for value based on regex match of key
 * @param unknown $array
 * @param unknown $regex
 * @return unknown
 */
/*function arr_regex($array,$regex){
 foreach($array as $k=>$v){
  if(preg_match('/' . $regex . '/', $k)){
   return $v;
  }
 }
}*/

/**
* Lookup list of id's from a lookup table that match a regex expression
*
*/
function idLookupTable($array,$regex,$key){
  $res = array();
  foreach($array as $k=>$v){
  if(preg_match('/' . $regex . '/', $k)){
   $res[] = $v[$key];
  }
 }
  return $res;
}
/**
 * Format stat
 * @param string $stat
 * @param number $value
 * @return string
 */
function formatStat($stat,$value){
 if(!isset(StatTabs::$statLookup[$stat])){return number_format($value);}

 switch(StatTabs::$statLookup[$stat]["formatting"]){
  case 'time':
   return gettimeformat($value);
   break;
  case 'timestamp':
   return date(BS_FORMAT_DATE,$value);
   break;

 }
 return number_format($value);
}

function startsWith($haystack, $needle)
{
    return !strncmp($haystack, $needle, strlen($needle));
}

?>