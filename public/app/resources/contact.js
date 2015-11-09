angular.module('app.resources')

.factory('Contact', function($resource) {
	var url = '/api/contact/:id';

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