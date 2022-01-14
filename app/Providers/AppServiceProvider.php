<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TypeRoom;
use App\Models\Room;

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
        view()->composer('header',function($view){
            $loai_sp = TypeRoom::all();
            $view->with('loai_sp',$loai_sp);
        });

        // view()->composer('page.typeroom_page', function ($view) {

        //     $product_new =  Room::all();

        //     $view->with('product_new', $product_new);

        // });
    }
}
