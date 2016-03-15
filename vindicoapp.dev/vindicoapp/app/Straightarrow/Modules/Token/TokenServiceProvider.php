<?php namespace App\Straightarrow\Modules\Token;

use Illuminate\Support\ServiceProvider;
use App\Straightarrow\Modules\Token\Repository\Eloquent\EloquentToken;
use App\Token;

class TokenServiceProvider extends ServiceProvider
{
  public function register()
  {
    $app = $this->app;

    //Token Repository
    $app->bind('App\Straightarrow\Modules\Token\TokenInterface',function(){
      return new EloquentToken(new Token);
    });

    //Token Gateway
    $app->bind('App\Straightarrow\Modules\Token\TokenGateway', function($app){
      return new TokenGateway(
        $app->make('App\Straightarrow\Modules\Token\TokenInterface')
      );
    });

  }
}