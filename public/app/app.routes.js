angular.module('app.routes')

.config(function($routeProvider) {

	$routeProvider
		.when('/', {
			controller: 'mainController',
			templateUrl: 'app/views/main.html'
		})
		.otherwise({
			redirectTo: '/'
		})
})