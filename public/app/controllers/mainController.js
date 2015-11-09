angular.module('app.controllers')

.controller('mainController', function($scope, $http) {

	$http({
  		method: 'GET',
  		url: '/api/contact'
	}).then(function successCallback(response) {
	    $scope.contacts = response.data;
  	}, function errorCallback(response) {
	    console.log(response);
  	});

	$scope.newContact = '';

	function addContact($scope) {
		$http({
		    url: '/api/contact',
		    method: "POST",
		    data: { 'name' : $scope.newContact }
		})
		.then(function(response) {
			$scope.contacts = response.data;
			$scope.newContact = ''
		}, 
		function(response) {
			console.log(response);
		});
}

})

