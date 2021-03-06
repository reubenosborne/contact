angular.module('app.controllers')

.controller('mainController', function($scope, $http, Contact, User, File, FileUploader) {


	// Load User

	$scope.user = User.get()


	// Load Contacts

	$scope.allContacts = Contact.query()



	// Set Contact

	$scope.setContact = function(contact) {

		$scope.saveContact()

		$scope.selectedContact = contact

		$scope.editMode = false

	}





	// Unselect Contact

	$scope.unselectContact = function() {
		
		$scope.selectedContact = undefined
		
	}





	// Add Contact

	$scope.addContact = function () {

		var contact = new Contact() // Create new contact

		$scope.selectedContact = contact

		$scope.editMode = true

		$scope.selectedContact.name = 'New Contact' // Set name to the input box content

		// Make a callback to handle what happens when the server responds
		contact.$save(function() {
			$scope.allContacts.push(contact)
		})

	}




	// Edit Contact

	$scope.editMode = false

  	$scope.editContact = function() {

    	$scope.editMode = !$scope.editMode

    	if(!$scope.editMode) {

    		$scope.saveContact()

    	}

  	}




  	// Save Contact

  	$scope.saveContact = function() {

  		if(!$scope.selectedContact) return
  			
  		if($scope.selectedContact.id) {

    		$scope.selectedContact.$update()

    	} else {

    		$scope.selectedContact.$save()
    	}
  	}




	// Delete Contact

	$scope.deleteContact = function() {

		var result = confirm("Are you absolutely sure you want to delete this contact?")
		
		if (result) {

			$scope.selectedContact.$delete(function() {

				$scope.allContacts = _.reject($scope.allContacts, function(contact) {
					return contact.id === $scope.selectedContact.id
				})

				$scope.selectedContact = undefined
			})
		}
	}



	// Delete File

	$scope.deleteFile = function(file) {

		var result = confirm("Are you absolutely sure you want to delete this file?")
		
		if (result) {

			File.delete(file, function() {

				$scope.selectedContact.files = _.reject($scope.selectedContact.files, function(f) {
					return f.id === file.id
				})



			})
		}
	}




	// Upload Avatar

	$scope.avatarUploader = new FileUploader()

	$scope.avatarUploader.onAfterAddingFile = function(item) {
		item.url = '/avatar/upload/' + $scope.selectedContact.id
		item.upload()

		item.onComplete = function (res) {
			$scope.selectedContact.avatar = res.avatar
		}
	}




	// Upload File

	$scope.fileUploader = new FileUploader()

	$scope.fileUploader.onAfterAddingFile = function(item) {

		// if ($scope.editMode) {return} // escape

		item.url = '/file/upload/' + $scope.selectedContact.id
		item.upload()

		item.onComplete = function (res) {
			$scope.selectedContact.files.push(res)
		}
	}


})