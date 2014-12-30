<?php 
require '../bootstrap.php';
check_auth();
define('BS_TITLE', "Player Manager");
require("../partials/header.php"); 

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
<div class="container-fluid" ng-app="bsScoreboard" ng-controller="listCtrl">
    <div ng-repeat="scoreboard in scoreboards">
      <h3>{{scoreboard.title}}</h3>
      <div class="row">
        <div class="col-md-4">
          <label>ID:</label> <input class="form-control" type="text" ng-model="scoreboard.id" placeholder="scoreboard id"><br>
        </div>
        <div class="col-md-4">
          <label>Title:</label> <input class="form-control" type="text" ng-model="scoreboard.title" placeholder="scoreboard title">
        </div>
        <div class="col-md-4">
          <label>Description:</label> <input class="form-control" type="text" ng-model="scoreboard.descrip" placeholder="scoreboard description">
        </div>
      </div>
      <div class="row">
        <table class="table table-striped col-md-12">
          <tr>
            <th>Label</th>
            <th>Domain</th>
            <th>World</th>
            <th>Category</th>
            <th>Statistic</th>
            <th>Sort<br/>Order</th>
            <th>ASC/DESC</th>
            <th></th>
          </tr>
          <tr ng-repeat="entry in scoreboard.data">
            <td><input class="form-control" type="text" ng-model="entry.label"></td>
            <td><input list="domain" class="form-control" type="text" ng-model="entry.domain"></td>
            <td><input list="world" class="form-control" type="text" ng-model="entry.world"></td>
            <td><input list="category" class="form-control" type="text" ng-model="entry.cat"></td>
            <td><input list="statistic" class="form-control" type="text" ng-model="entry.stat"></td>
            <td><input class="form-control" style="width:48px" type="number" min="1" ng-model="entry.order.idx"></td>
            <td><select class="form-control" ng-model="entry.order.type">
              <option value="NONE">None</option>
              <option value="asc">Asc</option>
              <option value="desc">Desc</option>
            </select>
          </td>
          <td>
            <div class="btn-group">
              <button class="btn btn-info"><i class="glyphicon glyphicon-arrow-up"></i></button>
              <button class="btn btn-info"><i class="glyphicon glyphicon-arrow-down"></i></button>
              <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
          </td>
        </tr>
      </table>
      <button ng-click="addScoreboardField($index)">Add Field</button>
      
    </div>
    <hr>
  </div>
  <button ng-click="addScoreboard()">Add Scoreboard</button>
</div>
<?php require("../partials/scripts.php"); ?>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.20/angular.min.js"></script>
<script src="ang.scoreboard.js"></script>
<?php require("../partials/footer.php"); ?>