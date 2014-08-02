(function(){
var rest = angular.module('bsAdmin.rest', ['ngResource']);

rest.factory('RestAPI', function($resource){
    return {
      overview: $resource('rest/overview')
    }
  })

})()