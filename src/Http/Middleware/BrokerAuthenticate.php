<?php

namespace Wdevkit\AuthClient\Http\Middleware;

use Closure;
use Exception;

abstract class BrokerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = resolve(\Wdevkit\Sdk\Api::class)::auth([
            'base_uri' => $this->authUri(),
            'token' => $this->authToken(),
        ])->fetchUser();

        if (!$user = data_get($response, 'data')) {
            throw new Exception("Error on wdevkit auth service request/response.", 1);
        }

        $this->authenticate($user);

        return $next($request);
    }

    /**
     * Authenticate user based on service response.
     *
     * @param array $user
     * @return void
     */
    abstract public function authenticate(array $user);

    /**
     * Get auth service uri.
     *
     * @return string
     */
    abstract public function authUri();

    /**
     * Get auth service token.
     *
     * @return string
     */
    abstract public function authToken();
}
