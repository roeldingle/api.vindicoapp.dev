<?php namespace App\Straightarrow\Modules\Profile;

use Illuminate\Support\ServiceProvider;
use App\Straightarrow\Modules\Profile\Repository\Eloquent\EloquentProfile;
use App\User as User;
use App\UserMeta as UserMeta;

class ProfileServiceProvider extends ServiceProvider
{

  public function register()
  {
    $app = $this->app;

    //Auth Repository
    $app->bind('App\Straightarrow\Modules\Profile\ProfileInterface',function($app){
      return new EloquentProfile(new User, new UserMeta);
    });

    //Auth Gateway
    $app->bind('App\Straightarrow\Modules\Profile\ProfileGateway', function($app){
      return new ProfileGateway(
        $app->make('App\Straightarrow\Modules\Profile\ProfileInterface')
        //$app->make('App\Straightarrow\Modules\ProfileFeeds\ProfileFeedsInterface')
      );
    });

  }
}
