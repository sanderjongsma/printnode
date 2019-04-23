# Laravel 5 PrintNode Api Wrapper

A simple Laravel 5 wrapper for the [official PrintNode PHP Library](https://github.com/PrintNode/PrintNode-PHP).

## Version overview

Uses the 2.0.0-rc1 version from the printnode php package

## Installation

### Step 1: Install Through Composer

``` bash
composer require sanderjongsma/printnode
```

### Step 2: Add the Service Provider
Add the service provider in `app/config/app.php`
```php
'provider' => [
    ...
    SanderJongsma\PrintNode\PrintNodeServiceProvider::class,
    ...
];
```

### Step 3: Add the Facades
Add the alias in `app/config/app.php`
```php
'aliases' => [
    ...
    'PrintNode' => SanderJongsma\PrintNode\Facades\PrintNode::class,
    'PrintJob' => SanderJongsma\PrintNode\Facades\PrintJob::class,
    ...
];
```

### Step 4: Publish configuration
``` bash
php artisan vendor:publish --provider="SanderJongsma\PrintNode\PrintNodeServiceProvider"
```

### Step 5: Customize configuration
You can directly edit the configuration in `config/printnode.php` or copy these values to your `.env` file.
```php
PRINTNODE_API_KEY=yourapikey
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.