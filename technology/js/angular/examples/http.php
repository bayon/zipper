<!DOCTYPE html>
<html>
<body>

<div ng-app="" ng-controller="customersController"> 

<ul>
  <li ng-repeat="x in names">
    {{ x.Name + ', ' + x.Country }}
  </li>
</ul>

</div>

<script>
function customersController($scope,$http) {
  $http.get("http://www.w3schools.com//website/Customers_JSON.php")
  .success(function(response) {$scope.names = response;});
}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>

</body>
</html>