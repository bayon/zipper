<?php
include_once ('head.php');
?>
<?php
	include_once ('slideMenuNav.php');
?>
<div class='page_content'>
	<div class='page_title'>
		two
	</div>
	<div ng-app="" ng-controller="customersController">
		<table border=1>
			<tr ng-repeat="x in names">
				<td>{{ x.Name  }}</td>
				<td>{{x.Country}}</td>
			</tr>
		</table>
	</div>

	<script>
		function customersController($scope, $http) {
			$http.get("../c/two.php").success(function(response) {
				$scope.names = response;
				 
			});
		}
	</script>

</div>

<?php
	include_once ('foot.php');
?>