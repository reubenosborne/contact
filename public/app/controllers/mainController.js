angular.module('app.controllers')

.controller('mainController', function($scope, $http, Contact) {



	// Load Contacts

	$scope.allContacts = Contact.query();




	// Set Contact

	$scope.setContact = function(contact) {

		$scope.saveContact();

		$scope.selectedContact = contact;

		$scope.editMode = false;

	};




	// Add Contact

	$scope.addContact = function () {

		var contact = new Contact(); // Create new contact

		$scope.selectedContact = contact;

		$scope.editMode = true;

		$scope.selectedContact.name = 'New Contact'; // Set name to the input box content

		// Make a callback to handle what happens when the server responds
		contact.$save(function() {
			$scope.allContacts.push(contact);
		});

	};




	// Edit Contact

	$scope.editMode = false;

  	$scope.editContact = function() {

    	$scope.editMode = !$scope.editMode;

    	if(!$scope.editMode) {
    		$scope.saveContact();
    	}

  	};




  	// Save Contact

  	$scope.saveContact = function() {
  		if(!$scope.selectedContact) return
  			
  		if($scope.selectedContact.id) {
    		$scope.selectedContact.$update();
    	} else {
    		$scope.selectedContact.$save();
    	}
  	}






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