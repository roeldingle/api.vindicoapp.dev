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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('api/v1', ['before' => 'oauth', function() {
 	// return the protected resource
 	//echo “success authentication”;
 	$user_id=Authorizer::getResourceOwnerId(); // the token user_id
 	$user=\App\User::find($user_id);// get the user data from database

	return Response::json($user);
}]);

Route::group(['prefix' => 'api/v1/auth'], function() {

    Route::get('test', ['before' => 'oauth'], 'LoginController@index');


    /*provide access_token*
	Route::post('access_token', function() {
	 return Response::json(Authorizer::issueAccessToken());
	});

});

Route::get('/register',function(){$user = new App\User();
	$user->name="test user2";
	$user->email="test2@test.com";
	$user->password = \Illuminate\Support\Facades\Hash::make("password2");
	$user->save();
});

*/


Route::group(['prefix' => 'api'], function(){

	Route::group(['prefix' => 'v1', 'namespace' => 'api\v1'],function(){

		Route::group(['prefix' => 'auth', 'before' => ''], function(){

			/*test request data*/
			Route::get('sample_data',[
			  'before' => 'oauth',
			  'as'    => 'api.v1.auth.sample_data',
		      'uses'  => 'AuthController@sample_data'
		    ]);

		    /*post login*/
			Route::post('login',[
			   'as'    => 'api.v1.auth.login',
		       'uses'  => 'AuthController@login'
			]);

			/*get logout*/
			Route::get('logout',[
			   'as'    => 'api.v1.auth.logout',
		       'uses'  => 'AuthController@logout'
			]);

			/*post register*/
			Route::post('register',[
			   'as'    => 'api.v1.auth.register',
		       'uses'  => 'AuthController@postRegister'
			]);



		});

	});

});







