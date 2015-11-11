angular.module('app.routes')

.config(function($routeProvider, $locationProvider) {

	$routeProvider
		.when('/', {
			controller: 'mainController',
			templateUrl: 'app/views/main.html'
		})
		.otherwise({
			redirectTo: '/'
		})

		$locationProvider.html5Mode(true);

})