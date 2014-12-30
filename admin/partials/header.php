<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= BS_APP_ROOT; ?>css/select2-bootstrap.css">
  <link href="<?= BS_APP_ROOT; ?>style.css" rel="stylesheet">
  <link href="<?= BS_ADMIN_ROOT; ?>css/login.css" rel="stylesheet">
  <title>BeardStat :: Admin area</title>
</head>
<body>
  <!-- Navigation here -->

  <div class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= BS_ADMIN_ROOT; ?>">BeardStat</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <!-- players -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Players <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php if(is_authed()) { ?>
              <li><a href="#/players">View players</a></li>
              <li><a href="#/players/reset">Reset a stat</a></li>              
              <li><a href="#/players/world/remove">Remove a world</a></li>
              <?php } ?>
            </ul>
          </li>
          <!-- Scoreboards -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i> Scoreboards <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php if(is_authed()) { ?>
              <li><a href="<?= BS_ADMIN_ROOT; ?>scoreboards/">View scoreboards</a></li>
              <li><a href="<?= BS_ADMIN_ROOT; ?>scoreboards/?function=hiddenplayers">Hide players from scoreboard rankings</a></li>
              <?php } ?>
            </ul>
          </li>
          <!-- Tabs -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-files-o"></i> Tabs <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#/tabs">View tabs</a></li>
              <li><a href="#/tabs/new">Add tab</a></li>
              <li><a href="#/tabs/new-custom">Add custom tab</a></li>
            </ul>
          </li>
          <!-- Reports -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tablet"></i> Reports (beta) <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php if(is_authed()) { ?>
              <li><a href="#/reports/playtime/avg">Average playtime</a></li>
              <li><a href="#/reports/playtime/avg">Total playtime</a></li>
              <li><a href="#/reports/sessiontime/avg">Average session time</a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Options <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= BS_ADMIN_ROOT; ?>logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
              <li><a href="../"><i class="fa fa-paper-plane"></i> Return to front end</a></li>
              <li><a href="#/about"><i class="fa fa-question"></i> About</a></li>
            </ul>
          </li>
          
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>