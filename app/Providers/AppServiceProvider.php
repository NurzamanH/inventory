<?php

namespace App\Providers;

use App\Models\MenusHasUser;
use Illuminate\Support\ServiceProvider;
use Auth, View;
use Illuminate\Contracts\Auth\Guard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        view()->composer('*', function($view) use ($auth) {
            $user = $auth->user();
            if($user){
                $menus = MenusHasUser::where('user_id', $user->id)->get();
                // other application logic...
                $view->with('dataMenu', $menus);
            }
          
        });
    }
}
