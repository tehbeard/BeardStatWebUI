<?php
require __DIR__ . '/../api/api.php';
session_start();
function is_authed(){ return isset($_SESSION["beardstat_authed"]); }
function check_auth(){
  if(!isset($_SESSION["beardstat_authed"])){
    header("Location: " . BS_ADMIN_ROOT . "login.php");
    die();
  }
}