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

#Route::get('/', 'WelcomeController@index');

Route::get('/', 'WelcomeController@index');

Route::any('auth/register','WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);




Route::group(['prefix'=>'api', 'namespace' => 'api\v1'],function(){

	Route::get('/',function(){
		return [];
	}); /* defaultview */

	Route::group(['prefix'=>'v1'],function(){

		Route::get('/',function(){
			return [];
		}); /* defaultview */

		

		Route::group(['prefix'=>'auth'],function(){

			Route::get('/',function(){
				return [];
			}); /* defaultview */

			Route::get('login',function(){
				return ['email'=>'sample@yahoo.com','password'=>'*****'];
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


			Route::get('register',function(){
				return [
					'email'=>'sample@yahoo.com',
					'password'=>'*****',
					'first_name' => 'John',
					'middle_name' => 'D',
					'last_name' => 'Doe',
					'gender' => 1,
					'about_me' => 'secret'
				];
			}); 

		    Route::post('register',[
		    	'as' 	=> 'api.v1.auth.register',
		    	'uses'  => 'AuthController@postRegister'
		    ]);

		});
	

		/************************** Search Controller *******************************/
		Route::group(['middleware' => 'api.access'],function(){
		  
		    Route::get('search','SearchController@getSearch');
		    Route::get('search-item','SearchController@getSearchItems');

		});


	});

});


Route::group([
    'prefix'    =>  'docs'
],function(){

    Route::get('/',function(){
        return '';
    });

    Route::group([
        'prefix'    =>  'v1'
    ],function(){
        Route::get('/',function(){ return View::make('docs.v1.documentation'); });
        Route::get('installation',function(){  return View::make('docs.v1.installation'); });
        Route::get('reference',function(){  return View::make('docs.v1.reference'); });
        Route::get('profile',function(){  return View::make('docs.v1.profile'); });
        Route::get('authentication',function(){  return View::make('docs.v1.authentication'); });
        Route::get('checkout',function(){  return View::make('docs.v1.checkout'); });
    });
});