# Wdevkit Auth Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wdevkit/auth-client.svg?style=flat-square)](https://packagist.org/packages/wdevkit/auth-client)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/wdevkit/auth-client/run-tests?label=tests)](https://github.com/wdevkit/auth-client/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/wdevkit/auth-client.svg?style=flat-square)](https://packagist.org/packages/wdevkit/auth-client)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require wdevkit/auth-client
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Wdevkit\AuthClient\AuthClientServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Wdevkit\AuthClient\AuthClientServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$authClient = new Wdevkit\AuthClient();
echo $authClient->echoPhrase('Hello, Wdevkit!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Gilmar Pereira](https://github.com/wdarking)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
