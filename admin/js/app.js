(function(){
var bsAdmin = angular.module('bsAdmin',['bsAdmin.rest','ngRoute']);
bsAdmin.constant("version",{
  ui:"0.1",
  plugin:"0.8.1+"
});
bsAdmin.constant("builtwith",[
  {url:"http://bukkit.org",name:"Bukkit API"},
  {url:"http://getbootstrap.com",name:"Bootstrap 3.x"},
  {url:"http://angularjs.org",name:"AngularJS"},
  {url:"https://github.com/nikic/FastRoute",name:"FastRoute"}
  ]);

bsAdmin.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.otherwise({templateUrl:'views/404.htm'})
    .when("/",{templateUrl:'views/home.htm',controller:'homeCtrl'})
    .when("/about",{templateUrl:'views/about.htm',controller:'aboutCtrl'});
  }]);

bsAdmin.controller('aboutCtrl', ['$scope','version','builtwith', function($scope,version,builtwith) {
  $scope.version = version;
  $scope.builtwith = builtwith;
}]);

bsAdmin.controller('homeCtrl',function($scope, RestAPI){
  $scope.stats = {
    playerCount: 0
  };
  RestAPI.overview.get().$promise.then(function(data){
    $scope.stats = data;
  });
});

})()