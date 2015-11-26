angular.module('app.resources')

.factory('User', function($resource) {
	var url = '/api/user';

	var defaults = {
		'id': '@id'
	}

	var methods = {
		update: {
			method: 'PUT'
		}
	}

	return $resource(url, defaults, methods);
})