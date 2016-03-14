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

Route::group(['prefix'=>'api', 'namespace' => 'api\v1'],function(){

	Route::get('/',function(){
		return [];
	}); /* defaultview */

	Route::group(['prefix'=>'v1'],function(){

		Route::get('/',function(){
			return [];
		}); /* defaultview */

		
		/************************** Using auth path *******************************/
		Route::group(['prefix'=>'auth'],function(){

			Route::get('/',function(){
				return [];
			}); /* defaultview */

			Route::get('login',function(){
				return ['email'=>'sample@yahoo.com','password'=>'*****'];
				//return Hash::make('password');
			});
			
		    Route::post('login',[
			    'as'    => 'api.v1.auth.login',
			    'uses'  => 'AuthController@postAuthenticate'
		    ]);

			Route::get('forgot',function(){
				return ['email'=>'sample@yahoo.com'];
			}); 

		    Route::post('forgot',[
			    'as'    => 'api.v1.auth.forgot',
			    'uses'  => 'AuthController@postForgot'
		    ]);

		    Route::get('logout',[
			    'as'    => 'api.v1.auth.logout',
			    'uses'  => 'AuthController@getLogout'
		    ]);

		    Route::post('register',[
		    	'as' 	=> 'api.v1.auth.register',
		    	'uses'  => 'AuthController@postRegister'
		    ]);

		});
	

		/************************** Using middleware api.access *******************************/
		Route::group(['middleware' => 'api.access'],function(){

	  		/************************** Search Controller *******************************/
		    Route::get('search','SearchController@getSearch');
		    Route::get('search-item','SearchController@getSearchItems');

			/************************** Search Controller *******************************/
		    Route::resource('reports','ReportsController');
		    Route::get('reports-delete','ReportsController@delete');

		});


	});

});


/*docs*/
Route::group(['prefix' => 'docs/v1'], function(){

	Route::get('/', ['as' => 'doc.v1.index', function(){
		return View::make('docs.v1.index');
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