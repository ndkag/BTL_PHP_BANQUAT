<?php

namespace App\Providers;

use App\Helper\Cart;
use App\Models\LoaiQuat;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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


    public function boot()
    {

        view()->composer("*", function ($view) {
            $view->with([
                'cart' => new Cart()
            ]);
        });


        view()->composer('*', function ($view) {
            $loaiQuat = LoaiQuat::paginate(10);

            $view->with('loaiQuat', $loaiQuat);
        });
    }
}
