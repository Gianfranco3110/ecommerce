<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart2;

class ViewComposerServiceProvider extends ServiceProvider {

    public function register ()
    {

    }

    public function boot (){

        View::composer('frontend.estado',function($view){

            $view->with('carritoCount',Cart2::getContent()->count());
        });
        View::composer('frontend.resumen',function($view){

            $view->with('carritoCount',Cart2::getContent()->count());
        });


        
    }
}



