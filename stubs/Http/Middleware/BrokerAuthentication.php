<?php

namespace App\Http\Middleware;

use Wdevkit\AuthClient\Http\Middleware\BrokerAuthenticate as MiddlewareBrokerAuthenticate;

class BrokerAuthenticate extends MiddlewareBrokerAuthenticate
{
    /**
     * Authenticate user based on service response.
     *
     * @param array $user
     * @return void
     */
    public function authenticate(array $user)
    {
        // todo
    }

    /**
     * Get auth service uri.
     *
     * @return string
     */
    public function authUri()
    {
        return config()->get('services.wdevkit.auth.base_uri');
    }

    /**
     * Get auth service token.
     *
     * @return string
     */
    public function authToken()
    {
        return config()->get('services.wdevkit.auth.token');
    }
}
