<?php namespace App\Straightarrow\Modules\Auth;

use DB;
class AuthEventSubscriber
{

  /**
   * Handle user login events
   * @return void
   */
  public function onUserLogin($data)
  {
    DB::table('tokens')->insert($data);
  }

  public function onUserLogout()
  {
    dd('USER LOGGED OUT');
  }

  public function onUserRegister()
  {
    dd('USER REGISTER');
  }

   /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
      $events->listen('auth.login', __NAMESPACE__ .'\AuthEventSubscriber@onUserLogin');
      $events->listen('auth.logout', __NAMESPACE__ .'\AuthEventSubscriber@onUserLogout');
      $events->listen('auth.register', __NAMESPACE__ .'\AuthEventSubscriber@onUserRegister');
    }
}