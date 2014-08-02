bsScoreboard = angular.module('bsScoreboard',[]);
bsScoreboard.controller('listCtrl',['$scope','$http', function($scope,$http) {
     $scope.tmpl = {};
  $scope.tmpl.scoreboard = {
    id:"newId",
    data: []
  };
  $scope.scoreboards = [];
  $scope.addScoreboard = function(){
    $scope.scoreboards.push(JSON.parse(JSON.stringify($scope.tmpl.scoreboard)));
  }

  $scope.addScoreboardField = function(idx){
    $scope.scoreboards[idx].data.push({});
  }

  $scope.ui = {
  	domains:[],
  	worlds:[],
  	categories:[],
  	statistics:[]
  };

  $http({method: 'GET', url: '../config/scoreboards.json'}).
  success(function(data, status, headers, config) {
      $scope.scoreboards = data;
  });

  $http({method: 'GET', url: 'getData.php?id=statistic'}).
  success(function(data, status, headers, config) {
  	for(x in data){
      $scope.ui.statistics.push(data[x]);
    }
  }).
  error(function(data, status, headers, config) {
    console.log(data);
    console.log(status);
    console.log(headers);
    console.log(config);
  });

}]);