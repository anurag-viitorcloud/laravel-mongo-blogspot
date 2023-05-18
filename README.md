# laravel-mongo-blogspot

### Introduction

It is a blog manager tool made with Laravel 9 & MongoDB.

### Installation

Assuming your machine meets all requirements - let's process to installation of Metronic Laravel integration (skeleton).

1. Open in cmd or terminal app and navigate to this folder
2. Run following commands

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```


```bash
php artisan migrate
```

```bash
php artisan db:seed
```
```bash
php artisan serve

And navigate to generated server link (http://127.0.0.1:8000)
```

### MongoDB Driver Setup

Install the package via Composer:

```bash
$ composer require jenssegers/mongodb
```

In case your Laravel version does NOT autoload the packages, add the service provider to `config/app.php`:

```php
Jenssegers\Mongodb\MongodbServiceProvider::class,
```

Configuration
-------------
You can use MongoDB either as the main database, either as a side database. To do so, add a new `mongodb` connection to `config/database.php`:

```php
'mongodb' => [
    'driver' => 'mongodb',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', 27017),
    'database' => env('DB_DATABASE', 'homestead'),
    'username' => env('DB_USERNAME', 'homestead'),
    'password' => env('DB_PASSWORD', 'secret'),
    'options' => [
        // here you can pass more settings to the Mongo Driver Manager
        // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use

        'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
    ],
],
```
For multiple servers or replica set configurations, set the host to an array and specify each server host:

```php
'mongodb' => [
    'driver' => 'mongodb',
    'host' => ['server1', 'server2', ...],
    ...
    'options' => [
        'replicaSet' => 'rs0',
    ],
],
```

Eloquent
--------

### Extending the base model
This package includes a MongoDB enabled Eloquent class that you can use to define models for corresponding collections.

```php
use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    //
}
```

Just like a normal model, the MongoDB model class will know which collection to use based on the model name. For `Book`, the collection `books` will be used.

To change the collection, pass the `$collection` property:

```php
use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    protected $collection = 'my_books_collection';
}
```
