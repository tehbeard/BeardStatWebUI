dropTextBox = angular.module('bsDropTextbox',[]);
dropTextBox.controller('dropTextBoxCtrl', ['$scope', function($scope) {
	$scope.showText = false;
	$scope.toggleState = function(){
		$scope.showText = !$scope.showText;
	};
}]);
dropTextBox.directive('dropTextbox', function () {
    /*BORKED BY ng-repeat primitive issue, same as book pages, need to encapsulate colors*/
    return {
      restrict: 'A',
      scope: {'value':'=','opt':'='},
      controller: 'dropTextBoxCtrl',
      template:
      '<div class="input-append">'+
'<input class="input-medium" type="text" ng-model="value" ng-show="showText==true" />'+
'<select class="input-medium" ng-model="value" ng-hide="showText" ng-options="c.statistic as c.name for c in opt">'+
'</select>'+
'<button ng-click="toggleState()" class="btn"><i class="icon-retweet"></i></button></div>'
  }
});

