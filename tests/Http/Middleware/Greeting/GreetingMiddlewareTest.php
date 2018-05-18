<?php

use App\Http\Middleware\GreetingMiddleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ServerBag;
use PHPUnit\Framework\TestCase;

class GreetingMiddlewareTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        $this->view = app('view');
        $this->middleware = new GreetingMiddleware($this->view);
        $this->request = new Request();
    }

    public function handleDataProvider()
    {
        return [
            ['2015-03-27 05:00:00', 'おはよう'],
            ['2015-03-27 09:59:59', 'おはよう'],
            ['2015-03-27 10:00:00', 'こんにちは'],
            ['2015-03-27 17:59:59', 'こんにちは'],
            ['2015-03-27 18:00:00', 'こんばんは'],
            ['2015-03-28 04:59:59', 'こんばんは'],
        ];
    }

    /**
     * @dataProvider handleDataProvider
     */
    public function testHandle($datetime, $expected)
    {
        $this->request->server = new ServerBag(['REQUEST_TIME' => strtotime($datetime)]);
        $this->middleware->handle($this->request, function($request){});
        $this->assertEquals($expected, $this->view->shared('greetingMessage'));
    }
}