angular.module('app.filters')

.filter('shorten', function () {
	return function (text, length) {
		length = length || 50;
		if (text.length > length) {
			return String(text).substring(0, length) + ".."
		} else {
			return text
		}
	}

});