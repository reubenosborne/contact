angular.module('app.filters')

.filter('initials', function() {
	return function(input) {

		var words = input.split(' ')

		var initials = []

		for (var i = 0; i < words.length; i++) {
			initials.push(words[i].charAt(0))
		}

		return initials.join(' ').toUpperCase()

		// return (initials[0] + ' ' + initials[initials.length-1]).toUpperCase()

	}
})