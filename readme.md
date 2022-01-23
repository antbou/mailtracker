# MailTracker

Perform for NOSQL1

## Requirements

| Tools                                         | Version |
| --------------------------------------------- | ------- |
| [Composer](https://getcomposer.org/download/) | 2.1.6   |
| [NPM](https://www.npmjs.com/)                 | 7.20    |
| [Docker](https://www.docker.com/get-started)  | 20.10   |

| Images (Docker)                         |
| --------------------------------------- |
| [redis](https://hub.docker.com/_/redis) |
| [mysql](https://hub.docker.com/_/mysql) |

## Installation

1. Clone the repo

    ```bash
    git clone https://github.com/antbou/mailtracker.git
    ```

2. Install dependencies

    ```bash
    cd mailtracker
    composer i
    npm i
    ```

3. Build assets

    ```bash
    npm run dev
    ```

4. Generate application key and add it in `.env`
    ```bash
    php artisan key:generate
    cp .env.example .env
    ```

## Usage

The environment variables are configured in .env which is located at the root of the project.

In this project, we use 2 databases

-   MongoDb
-   Redis

We use mongodb to store the program's business data (trackers, targets, states ...).

As for redis, we use it to sotcker 2 types of data :

-   php sessions
-   ORM's request result

### MongoDB

[Mongodb](https://www.php.net/manual/en/mongodb.installation.php) php extension is required.

```
# .env

DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=<CHANGE>
DB_USERNAME=<CHANGE>
DB_PASSWORD=<CHANGE>
```

### Redis

```
# .env

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

Builds, (re)creates, starts, and attaches to containers for a service.

```bash
docker-compose up -d --build
```

### Fake Data

Populate the database with fake data

```sh
php artisan migrate:fresh --seed
```

## Database model

![MCD](/documents/db/MCD.png)

## Deployment

To launch the application in production, just follow the [guide](https://laravel.com/docs/8.x/deployment) provided by the laravel community
