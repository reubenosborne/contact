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

// Resources
Route::resource('api/contact', 'ContactsController');

//Upload Avatars
Route::post('upload/{id}', function(Request $request, $id) {

	$contact = Contact::find($id);

	$fileName = date('U').$contact->id.'.jpg';

	$request->file('file')->move(public_path('assets/img/avatars'), $fileName);

	$contact->avatar = $fileName;

	$contact->save();

	return $contact;

});