<?php namespace App\Straightarrow\Modules\Auth;

use Illuminate\Support\ServiceProvider;
use App\Straightarrow\Modules\Auth\Repository\Eloquent\EloquentAuth;
use App\User as User;

class AuthServiceProvider extends ServiceProvider
{

  public function register()
  {
    $app = $this->app;

    //Auth Repository
    $app->bind('App\Straightarrow\Modules\Auth\AuthInterface',function($app){
      return new EloquentAuth(new User);
    });

    //Auth Gateway
    $app->bind('App\Straightarrow\Modules\Auth\AuthGateway', function($app){
      return new AuthGateway(
        $app->make('App\Straightarrow\Modules\Auth\AuthInterface'),
        $app->make('App\Straightarrow\Modules\Token\TokenInterface'),
        $app->make('App\Straightarrow\Modules\Auth\AuthValidation'),
        $app->make('Illuminate\Contracts\Hashing\Hasher'),
        $app->make('Illuminate\Contracts\Auth\Authenticatable')
      );
    });

    //Auth Events
    $app->events->subscribe('App\Straightarrow\Modules\Auth\AuthEventSubscriber');

  }
}
