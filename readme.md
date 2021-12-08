# MailTracker

Perform for NOSQL1

## Requirements

| Tools                                         | Version |
| --------------------------------------------- | ------- |
| [Docker](https://docs.docker.com/get-docker/) | 20.10   |

## Install

```bash
git clone https://github.com/antbou/mailtracker.git
cd mailtracker
```

## Usage

The different local variables are found in the `.env.php` file which must be located at the root of the project.
The sample file is named `.env-exemple.php`

### docker :

Local docker configuration file for MYSQL

```
# docker/db.env
MYSQL_ROOT_PASSWORD=TO_CHANGE
MYSQL_DATABASE=TO_CHANGE
MYSQL_USER=TO_CHANGE
MYSQL_PASSWORD=TO_CHANGE
```

```
# To be done at the first launch :
docker-compose up
```

Start the containers (once the images are created)

```
docker-compose start
```

Stop the containers

```
docker-compose stop

```
