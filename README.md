# Laravel Loggable - Log you model changes

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
![Packagist Version](https://img.shields.io/packagist/v/alkhachatryan/laravel-loggable)
![CodeFactor Grade](https://img.shields.io/codefactor/grade/github/alkhachatryan/laravel-loggable)

Laravel Loggable is a package for eloquent models, which will monitor the changes on the models and log.
It supports two drivers: File and Database.

# Features
- High-configurable
- Two drivers (database and file)
- Possibillity to use two drivers at once
- Possibillity to select the columns for the model which should be logged
- Possibillity to select the actions for the model which should be logged (create, edit, delete)
- Facade-based structure to fetch the logs for specific model
- Much more

![Logs](https://raw.githubusercontent.com/alkhachatryan/laravel-loggable/master/photo.jpg)

# Installation
##### Install the package.
`composer require alkhachatryan/laravel-loggable`

##### Publish the configuration file
`php artisan vendor:publish --tag=loggable`

##### Run migration
`php artisan migrate`

# Configuration
Open the configuration file at /config/loggable.php

Set the driver whhich will log the model changes (can be both).
However, it's recommended to use the database driver so you can fetch the logs in the future.
```php 
'driver' => 'database' 
```


That's it!

# Usage
```php 
class Post extends Model
{
    /** Include the loggable trait */
    use Loggable;
    
    /** Specified actions for this model */
    public $loggable_actions = ['edit', 'create', 'delete'];

    /** Specified fields for this model */
    public $loggable_fields  = ['title', 'body'];

    protected $fillable = ['title', 'body'];
}
```

##### Retriving the model logs via Facade
```php
Loggable::model('App\Post');
```
##### Retriving the model logs via Model
```php
LoggableModel::whereModelName('App\Post')->orderBy('id', 'DESC')->paginate(10);
```

##### Event
You can use the event *Alkhachatryan\LaravelLoggable\Events\Logged* in pair with your listeners.

# Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

# Credits

- [Alexey Khachatryan](https://github.com/alkhachatryan)
- [All Contributors](https://github.com/alkhachatryan/laravel-loggable/contributors)
<!-- ALL-CONTRIBUTORS-LIST:START -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://khachatryan.org/"><img src="https://avatars1.githubusercontent.com/u/22774727?v=4" width="100px;" alt=""/><br /><sub><b>Alexey</b></sub></a></td>
    <td align="center"><a href="https://liamhammett.com"><img src="https://avatars0.githubusercontent.com/u/4326337?v=4" width="100px;" alt=""/><br /><sub><b>Liam Hammett</b></sub></a></td>
    <td align="center"><a href="https://github.com/deligoez"><img src="https://avatars1.githubusercontent.com/u/3030815?v=4" width="100px;" alt=""/><br /><sub><b>Yunus Emre Deligöz</b></sub></a></td>
  </tr>
</table>

<!-- markdownlint-enable -->
<!-- prettier-ignore-end -->
<!-- ALL-CONTRIBUTORS-LIST:END -->
# Todo
Tests!!! Tests!!! Tests!!!

# Security
If you discover any security-related issues, please email info@khachatryan.org instead of using the issue tracker.

# License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
