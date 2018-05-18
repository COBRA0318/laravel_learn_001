<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Carbon\Carbon;

class GreetingMiddleware
{
    /**
     * Create a new instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $timestamp = $request->server('REQUEST_TIME');
        $hour = Carbon::createFromTimeStamp($timestamp, Config::get('app.timezone'))->hour;

        $message = 'こんばんは';
        if (in_array($hour, range(5, 9)))
        {
            $message = 'おはよう';
        }
        else if (in_array($hour, range(10, 17)))
        {
            $message = 'こんにちは';
        }
        $this->view->share('greetingMessage', $message);

        return $next($request);
    }
}
