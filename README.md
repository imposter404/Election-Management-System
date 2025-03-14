# Election Management System 



<div align="left">

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg" height="50px" alt="JavaScript"  />

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg" height="50px" alt="Html"  />

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg" height="50px" alt="CSS" />

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" height="50px" alt="PHP"/>

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mongodb/mongodb-original-wordmark.svg" height="50px" alt="MongoDB" />
          
<img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original-wordmark.svg" height="50px" alt="MongoDB" />
          



</div>
    


# Overview
to build a Election Management System for digital voting process 

# Description 

# Setup

## Enviornment Setup
- install MongoDb Compass 
- for MongoDb PHP connection you will need the PHP_MONGODB.dll file download from [PERL](https://pecl.php.net/package/mongodb)
    - now you will have 2 option
        - Thread Safe (ts)
        - Non Thread Safe (nts)
- install `Xampp`
- go to `Xampp/php` there will be a file `php8ts.dll` download `ts` or `nts` accoding to it
- copy the `PHP_MONGODB.dll` file to `Xampp/php/ext` and paste it here 
- goto  `Xampp/php/php.ini` and write the code

> ```txt
> extension=php_mongodb.dll
> ```

- now Start the `Xampp` app and start the Apache Server
- then go to `Admin` > `PHP_Info` ... or type this in browser
> ```txt
> http://localhost/dashboard/phpinfo.php
> ```
- search for `MongoDB` it will say `enabled`
- now go to `Composer` website and download it []
- go to your project dir and create a folder `phpmongodb` and open this dir in `cmd`
- run the command 
> ```cmd
> composer require "mongodb/mongodb^1.0.0"
> ```
it will download all the required extention for the PHP MongoDB connection
And You Are All Done Now :)

## Code Setup
- create your PHP file 
- check for MongoDb connection
> ```php
>    if (!extension_loaded('mongodb')) {
>       die('MongoDB extension is not loaded');
>    }
> ```

- then load the require extentions
>```php
>   require(__DIR__."/phpmongodb/vendor/autoload.php");
>```
- Establish the MongoDb Connection
>```php
>   $client = new MongoDB\Client("mongodb://localhost:27017");
>```

All Done :)