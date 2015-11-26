<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use App\Contact;
use App\File;




// Home page
Route::get('/', ['middleware' => 'auth', function() {
	return view('index');
}]);

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
	'password' => 'Auth\PasswordController'
]);

// API & Resources
Route::resource('api/contact', 'ContactsController');

Route::get('api/user', function() {
	$user = Auth::user();
	return $user;
});

Route::resource('api/file', 'FilesController');

//Upload Avatars
Route::post('avatar/upload/{id}', function(Request $request, $id) {

	$contact = Contact::find($id);

	$fileName = date('U').$contact->id.'.jpg';

	$request->file('file')->move(public_path('assets/img/avatars'), $fileName);

	$contact->avatar = $fileName;

	$contact->save();

	return $contact;

});

//Upload Avatars
Route::post('file/upload/{id}', function(Request $request, $id) {

	$file = new File();

	$contact = Contact::find($id);

	$file->contact_id = $id;

	$folder = public_path('assets/files/' . $contact->name);

	if (is_dir($folder) == false) {
		mkdir($folder);
	}

	$uploadedFile = $request->file('file');

	$fileName = $uploadedFile->getClientOriginalName();

	$uploadedFile->move($folder, $fileName);

	$file->name = $fileName;

	$file->save();

	return $file;

});
