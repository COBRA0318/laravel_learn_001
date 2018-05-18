<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    public function handle($request, Closure $next)
    {
//        $response = $next($request);
//        /*
//        $content = $response->content();
//
//        $pattern = '/<middleware>(.*)<\/middleware>/i';
//        $replace = '<a href="http://$1">$1</a>';
//        $content = preg_replace($pattern, $replace, $content);
//
//        $response->setContent($content);
//        */
//        return $response;
        $data = [
            [ 'name' => 'taro1','mail' => 'taro1@yamada'],
            [ 'name' => 'hanako1','mail' => 'hanako1@flower'],
            [ 'name' => 'sachiko1','mail' => 'sachiko1@happy']
        ];
        $request->merge(['data' =>$data]);
        return $next($request);
    }
}
