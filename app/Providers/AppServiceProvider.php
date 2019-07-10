<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // //对MTSQL事件进行监听，但是监听又怎么样，可以把监听的内容放到一个文件中，然后需要一个对文件内容进行管理的方法，储存时间，
        // DB::listen(function($query)){
        //     //
        //     //$query->sql;
        //     //$query->bindings;
        //     //$query->time;
        // }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
