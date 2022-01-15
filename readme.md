# MailTracker

Perform for NOSQL1

## Requirements

| Tools                                         | Version |
| --------------------------------------------- | ------- |
| [Composer](https://getcomposer.org/download/) | 2.1.6   |
| [NPM](https://www.npmjs.com/)                 | 7.20    |
| [Docker](https://www.docker.com/get-started)  | 20.10   |

| Images (Docker)                                | 
| ---------------------------------------------  | 
| [redis](https://hub.docker.com/_/redis)          | 
| [mysql](https://hub.docker.com/_/mysql)        | 

## Install

```bash
git clone https://github.com/antbou/mailtracker.git
cd mailtracker
composer i
npm i
npm run dev
docker-compose up -d
php artisan serve
```

## Usage

The different local variables are found in the .env file which must be located at the root of the project. An example file is available at the root of the project under .env.example

#### MongoDB

[Mongodb](https://www.php.net/manual/en/mongodb.installation.php) php extension is required.

```
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=<CHANGE>
DB_USERNAME=<CHANGE>
DB_PASSWORD=<CHANGE>
```

#### Redis
```
SESSION_DRIVER=redis
SESSION_LIFETIME=120
REDIS_CLIENT=predis
MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=9379
```

### Docker

We used docker to facilitate the installation and development of the project. This way we can abstract the host on which the project is developed.

Local docker configuration file for MYSQL. An example file is available in docker/db-exemple.env
The sample file is named `db-exemple.env`
```
# docker/db.env
MYSQL_ROOT_PASSWORD=TO_CHANGE
MYSQL_DATABASE=TO_CHANGE
MYSQL_USER=TO_CHANGE # must be different than "root"
MYSQL_PASSWORD=TO_CHANGE
```

```
# To be done at the first launch :
docker-compose up
```

Start the containers

```
docker-compose start
```

Stop the containers

```
docker-compose stop
```
