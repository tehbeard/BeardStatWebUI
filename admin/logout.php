<?php 
require 'bootstrap.php';
  unset($_SESSION["beardstat_authed"]);
  header("Location: " . BS_ADMIN_ROOT);