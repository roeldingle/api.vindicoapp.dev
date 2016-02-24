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


/*docs*/

Route::group(['prefix' => 'docs/v1'], function(){

  Route::get('/', ['as' => 'doc.v1.index', function(){

    return View::make('docs.v1.index');
    //return "dfdf";

  }]);

  Route::get('installation', ['as' => 'doc.v1.installation', function(){

    return View::make('docs.v1.installation');

  }]);

  Route::get('register', ['as' => 'doc.v1.register', function(){

    return View::make('docs.v1.register');

  }]);

  Route::get('authentication', ['as' => 'doc.v1.authentication', function(){

    return View::make('docs.v1.authentication');

  }]);

 

});




