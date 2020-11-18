# Winsel

Winsel is a web application to check if the weather has an impact on your productivity.

### Motivation!

The idea of the project has been to test my knowledge in Laravel and add a utility with an API.

### Tech

* [PHP] - version 7.4.12
* [Laravel] - version 8.x
* [Composer] - version 2.0.7
* [Nginx] - version 1.19.4
* [MySQL] - version 5.7.28
* [Bootstrap] - version 4.5

### Launch
#### Requirements
* Docker

Once we have downloaded or cloned the project. First of all, you will need to create two '.env'. We will create one in the root folder and the second in the src folder.

In the .env of the root folder we will need the following information:
* DB_PORT
* PHP_TAG
* BACK_PORT
* SRC_FOLDER
* NGINX_TAG
* MYSQL_TAG
* COMPOSER_TAG
* APP_URL
* CONTEXT_FOLDER

For the second .env we can use .env.example and adapt it to our needs. For the API call we have to add:
* WEATHER_CITY - City where we want to check the weather
* WEATHER_ID - [API Key] that we can obtain for free
* WEATHER_URL=http://api.openweathermap.org/data/2.5/forecast?q=${WEATHER_CITY}&appid=${WEATHER_ID}

#### Start
To initiate the docker containers we will use:
```sh
$ docker-compose up
```

Now we will create the tables and add some values to our database, in addition to creating a user (user: winsel, password: winsel). All this information can be modified in the seeders (src / database / seeders):
```sh
$ docker exec app php artisan migrate:fresh --seed
```

If when changing some data it is not updated instantly we can use:
```sh
$ docker run --rm --volume $PWD/src:/app composer dump-autoload
```

### Testing
During the completion of the project, [Laravel Dusk] was used to check that everything worked as proposed. [Github Actions] has also been used to check the operation once the project has been uploaded to the repository.


[PHP]:<https://www.php.net/>
[Laravel]:<https://laravel.com/>
[Composer]:<https://getcomposer.org/>
[Nginx]:<http://nginx.org/>
[MySQL]:<https://www.mysql.com/>
[API Key]:<https://openweathermap.org/api>
[Bootstrap]:<https://getbootstrap.com/>
[Laravel Dusk]:<https://laravel.com/docs/8.x/dusk>
[Github Actions]:<https://github.com/features/actions>