<?php

namespace Wdevkit\AuthClient\Tests;

use Illuminate\Support\Facades\Route;
use Mockery;
use Mockery\Mock;
use Wdevkit\AuthClient\Http\Middleware\BrokerAuthenticate;

class BrokerAuthMiddlewareTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Route::get('/any', function () {
            return 'ok';
        })->middleware([TestBrokerAuthenticate::class]);
    }

    public function testItHitsBrokerAuthenticateHandleMiddleware()
    {
        $middleware = Mockery::spy(TestBrokerAuthenticate::class);

        $this->instance(TestBrokerAuthenticate::class, $middleware);

        $this->get('/any');

        $middleware->shouldHaveReceived('handle');
    }

    public function testItRunsSdkAuthServiceMethod()
    {
        $service = Mockery::spy(\Wdevkit\Sdk\Api::class);

        $this->instance(\Wdevkit\Sdk\Api::class, $service);

        $this->get('/any');

        $service->shouldHaveReceived('auth');
    }

    public function testItRunsMiddlewareAuthenticateMethod()
    {
        $this->instance(\Wdevkit\Sdk\Api::class, MockWdevkitSdkApi::class);

        $middleware = Mockery::spy(TestBrokerAuthenticate::class.'[authenticate]');

        $this->instance(TestBrokerAuthenticate::class, $middleware);

        $this->get('/any');

        $middleware->shouldHaveReceived('authenticate');
    }
}

class TestBrokerAuthenticate extends BrokerAuthenticate
{
    public function authenticate(array $user)
    {
        return true;
    }

    public function authUri()
    {
        return 'https://auth.domain.tld';
    }

    public function authToken()
    {
        return 'some_token';
    }
}

class MockWdevkitSdkApi
{
    public static function auth($settings = [])
    {
        return (new class {
            public function fetchUser($data = [])
            {
                return [
                    'data' => [
                        'uuid' => 'e2b8206b-453c-45ef-a385-c4d38c4f23c7',
                        'name' => 'John Doe',
                        'email' => 'john@email.com',
                    ]
                ];
            }
        });
    }
}
