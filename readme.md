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

The different local variables are found in the `db.env` file which must be located at the root of the project.
The sample file is named `db-exemple.env`

### docker :

Local docker configuration file for MYSQL

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
