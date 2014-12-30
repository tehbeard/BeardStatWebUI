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
              <li><a href="<?= BS_APP_ROOT; ?>"><i class="fa fa-paper-plane"></i> Return to front end</a></li>
              <li><a href="<?= BS_ADMIN_ROOT; ?>about"><i class="fa fa-question"></i> About</a></li>
            </ul>
          </li>
          
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>