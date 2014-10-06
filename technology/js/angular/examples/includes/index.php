<!DOCTYPE html>
<html ng-app="">
<head>
<link rel="stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>

<body ng-controller="userController">

<div class="container">
  <div ng-include="'myUsers_List.html'"></div>
  <div ng-include="'myUsers_Form.html'"></div>
</div>

<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
<script src= "../myUsers.js"></script>

</body>
</html>