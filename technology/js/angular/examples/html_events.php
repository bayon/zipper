<!DOCTYPE html>
<html>
<body>

<div ng-app="" ng-controller="personController">

<button ng-click="toggle()">Hide user</button>

<p ng-hide="myVar">
First Name: <input type=text ng-model="person.firstName"><br>
Last Name: <input type=text ng-model="person.lastName"><br><br>
Full Name: {{person.firstName + " " + person.lastName}}
</p>

</div>

<script>
function personController($scope) {
    $scope.person = {
        firstName: "John",
        lastName: "Doe"
    };
    $scope.myVar = false;
    $scope.toggle = function() {
        $scope.myVar = !$scope.myVar;
    };
}
</script> 

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>


</body>
</html>