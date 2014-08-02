function saveData(){
  console.log(angular.toJson(angular.element("body").scope().scoreboards,true));
  $.ajax('rest.php?id=scoreboards',{
    'data': angular.toJson(angular.element("body").scope().scoreboards,true), 
    'type': 'POST',
    'processData': false,
    success: function(data){console.log(data);},
    'contentType': 'application/json'
  });
}