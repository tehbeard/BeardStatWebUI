<?php
require 'session.php';
require '../api/api.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- JQuery -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="<?php echo BS_APP_ROOT; ?>/style.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo BS_APP_ROOT; ?>/js/PlayerHead.js"></script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo BS_APP_ROOT; ?>/css/select2-bootstrap.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/3.4.5/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
<script type="text/javascript" src="ang.scoreboard.js"></script>
<script type="text/javascript" src="saveScoreboard.js"></script>
<title>Scoreboards</title>
</head>
<body ng-app="bsScoreboard" ng-controller="listCtrl">
  <div class="container">
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
            <div class="btn-group-vertical">
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
</body>
</html>