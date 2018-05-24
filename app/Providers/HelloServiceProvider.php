<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            'hello.index',function ($view){
                $view->with('view_message','composer message!');
            }
        );
		/*
        Validator::extend('hello', function($attribute, $value, 
                $parameters, $validator) {
            return $value % 2 == 0;
        });
		*/
    }

}
