<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product_type;
use App\Cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $loai_sp=Product_type::all();//Lấy tất cả loại sản phẩm từ database
            $view->with('loai_sp',$loai_sp);//Đổ nó vào header
        });


       
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
