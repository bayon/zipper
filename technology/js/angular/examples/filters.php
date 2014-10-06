<!DOCTYPE html>
<html>

<body>

<div ng-app="" ng-controller="costController">

Quantity: <input type="number" ng-model="quantity">
Price: <input type="number" ng-model="price">

<p>Total = {{ (quantity * price) | currency }}</p>

</div>

<script>
function costController($scope) {
    $scope.quantity = 1;
    $scope.price = 9.99;
}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>

</body>
</html>