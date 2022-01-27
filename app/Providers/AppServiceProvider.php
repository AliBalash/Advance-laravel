<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\FacadesTest\PostCart;
use App\FacadesTest\PostCartSendingService;
use App\Http\Views\CategoryComposer;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        //for service container
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (Auth::check()){

                return new BankPaymentGateway('Doler', 0);
            }else{

                return new CreditPaymentGateway('riyal', 0);
            }
        });

        //for facade
        $this->app->singleton('postCart',function ($app){
            return new PostCartSendingService('US', '10', 15);
        });

        //for test
//        $this->app->singleton('oskol', function ($app) {
//            return Post::all();
//        });



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*OPTION #1
        /*share get tow parameter
         *one -> name of variable before render view
         *tow -> value of variable setter before than
         * use all of View

        View::share('categories', Category::all());
         */


        /*OPTION #2
        /*View Composer
         *View Composer get tow parameter
         * one ->name or names of views
         * tow->callback function before render view run it
        View::composer(['category.index*'], function ($view) {
            $view->with('categories', Category::orderBy('name')->get());
        });
         */

        /*OPTION #3
        /*create View Compose class customize
        *artisan cant create this with command then create handy this class
        */

        View::composer('category.*', CategoryComposer::class);
    }
}
