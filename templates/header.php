<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- JQuery -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<?php
global $headHtml;
if(isset($headHtml)){echo $headHtml;}
?>

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> -->

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet">
<script type="text/javascript" src="js/PlayerHead.js"></script>

<title><?php echo defined('BS_TITLE') ? ('BeardStat :: ' . BS_TITLE) : "BeardStat"; ?></title>
</head>
<body>
<div class="container">
<div class="row">
