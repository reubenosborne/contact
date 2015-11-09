angular.module('app.controllers')

.controller('mainController', function($scope, $http, Contact) {



	// Load Contacts

	$scope.allContacts = Contact.query();



	// Set Contact

	$scope.setContact = function(contact) {

		$scope.selectedContact = contact;

	};



	// Add Contact

	$scope.addContact = function () {

		var contact = new Contact(); // Create new contact

		$scope.selectedContact = contact;

		$scope.editMode = true;

		contact.name = $scope.newContactName; // Set name to the input box content

		// Make a callback to handle what happens when the server responds
		contact.$save(function() {
			$scope.allContacts.push(contact);
		});

		$scope.newContactName = null;

	};



	// Edit Contact

	$scope.editMode = false;

  	$scope.editContact = function(selectedContact) {

    	$scope.editMode = !$scope.editMode;
    	
    	var contact = Contact.get({ id: selectedContact.id });
    	
    	contact.email = $scope.selectedContact.email;

    	$scope.selectedContact.$update();

  	};



	// Delete Contact

	$scope.deleteContact = function() {

		var result = confirm("Are you sure you want to delete this contact?");
		
		if (result) {

			$scope.selectedContact.$delete(function() {

				$scope.allContacts = _.reject($scope.allContacts, function(contact) {
				return contact.id === $scope.selectedContact.id;
				})

				$scope.selectedContact = undefined;
			})
		}
	};

})