<?php

namespace Illuminate\Foundation\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Middleware
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $container;

    /**
     * The redirector instance.
     *
     * @var \Illuminate\Routing\Redirector
     */
    protected $redirector;

    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Routing\UrlGenerator
     */
    protected $url;

    /**
     * The response factory instance.
     *
     * @var \Illuminate\Routing\ResponseFactory
     */
    protected $response;

    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @param  \Illuminate\Routing\Redirector  $redirector
     * @param  \Illuminate\Routing\UrlGenerator  $url
     * @param  \Illuminate\Routing\ResponseFactory  $response
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Container $container, Redirector $redirector, UrlGenerator $url, ResponseFactory $response, AuthFactory $auth)
    {
        $this->container = $container;
        $this->redirector = $redirector;
        $this->url = $url;
        $this->response = $response;
        $this->auth = $auth;
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
        return $next($request);
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    protected function redirectTo($request, $guard = null)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
