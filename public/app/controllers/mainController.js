angular.module('app.controllers')

.controller('mainController', function($scope, $http, Contact) {

	// Load Contacts

	$scope.allContacts = Contact.query();



	// Add Contact

	$scope.addContact = function () {

		var contact = new Contact(); // Create new contact

		contact.name = $scope.newContact; // Set name to the input box content

		// Make a callback to handle what happens when the server responds
		contact.$save(function() {
			$scope.contacts.push(contact);
		});

	}



	// Set Contact

	$scope.setContact = function(contact) {
		console.log(contact);

		$scope.selectedContact = contact;
	}



	// Delete Contact

	$scope.deleteContact = function(selectedContact) {
		
	}

})

