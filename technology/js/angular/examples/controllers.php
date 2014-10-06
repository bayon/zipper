<!DOCTYPE html>
<html>
<body>

<div ng-app="" ng-controller="personController">

First Name: <input type="text" ng-model="person.firstName"><br>
Last Name: <input type="text" ng-model="person.lastName"><br>
<br>
Full Name: {{person.fullName()}}

</div>

<script>
function personController($scope) {
    $scope.person = {
        firstName: "John",
        lastName: "Doe",
        fullName: function() {
            var x = $scope.person;	
            return x.firstName + " " + x.lastName;
        }
    };
}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>


</body>
</html>
