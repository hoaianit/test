<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Web developer test - An Duong</title>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>
<body>

<?php
$people = array(
   array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
   array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
   array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
   array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
   array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

// invoke json_encode here so we can clean up the string
// include JSON_HEX_APOS option (for apostrophe in O'Reilly)
$json_people = json_encode($people, JSON_HEX_APOS);

// replace \\n which would cause errors in JavaScript
$json_people = str_replace("\\n", " ", $json_people);

?>

<body>
<h1>Web developer test - An Duong</h1>
<div ng-app="myApp" ng-controller="peopleCtrl"> 

<table border="1">
<thead>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
</thead>
  <tr ng-repeat="x in people">
    <td>{{ x.first_name }}</td>    
	<td>{{ x.last_name }}</td>
	<td>{{ x.email }}</td>
	<td><button ng-click="alertName(x.first_name,x.last_name,x.email)">Alert</button></td>
  </tr>
</table>
</div>

<script type="text/javascript">

var people = JSON.parse( '<?php echo $json_people ?>' );

angular.module('myApp', []).controller('peopleCtrl', function($scope) {
$scope.people = people;
	$scope.alertName = function(first_name,last_name,email) {
	var alertContent='Name: '+first_name+' '+last_name+', email: '+email;
    alert(alertContent);
	}
});

</script>

</body>
</html>