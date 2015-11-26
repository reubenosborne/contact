angular.module('app.resources')

.factory('File', function($resource) {
	var url = '/api/file/:id';

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