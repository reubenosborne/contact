angular.module('app.filters')

.filter('initials', function() {
	return function(input) {

		var words = input.split(' ')

		var initials = []

		for (var i = 0; i < words.length; i++) {
			initials.push(words[i].charAt(0))
		}

		if (words.length > 1) {
			return initials[0] + ' ' + initials[initials.length-1]
		} else {
			return initials[0]
		}

	}
})