<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order;
use App\Repositories\OrderRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.user', function($view)
        {
            $cartcount = 0;
            if($user = \Auth::user()){
                $orderRepository = new OrderRepository();
                $order = $orderRepository->getUserOrder($user->id);
                $cartcount = $order->orderDetails()->count();
            }
            $view->with('cartcount', $cartcount);
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
