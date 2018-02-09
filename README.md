<p align="center">
    <h1 align="center">Simple GeoIP microservice</h1>
    <br>
</p>


DIRECTORY STRUCTURE
-------------------

      actions/            contains custom yii actions
      assets/             contains assets definition
      components/         contains application components
      config/             contains application configurations
      controllers/        contains Web controller classes
      models/             contains model classes
      runtime/            contains files generated during runtime
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0 and Redis.


INSTALLATION
------------

You can install this project using the following commands:

~~~
git clone git@github.com:Tairesh/test-geoip.git
cd test-geoip
composer install
~~~

Now you should be able to access the application through the following URL, assuming `test-geoip` is the directory
directly under the Web root.

~~~
http://localhost/test-geoip/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\redis\Connection',
    'hostname' => 'localhost',
    'port' => 6379,
    'database' => 0,
];
```
