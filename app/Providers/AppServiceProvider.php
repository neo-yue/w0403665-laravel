<?php

namespace App\Providers;



use App\Theme;
use App\View\composers\ThemeComposer;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        View::composer('*',ThemeComposer::class);  //option1

        if(env('APP_ENV') =='production') {
            URL::forceScheme('https');
        }


//        View::composer('*',function ($view){
//            $view->with('themes',Theme::all());   //option2
//        });

//        View::share('themes',Theme::all());  //option3
    }

}
