# Task Manager

This project is an API for manage tasks made in Laravel

## Project setup

Configure .env file.

```
cp .env.example .env
```

To start the development of this project, install the dependencies.

```
composer install
```

Start the containers to improve the use.

```
docker-compose up --build -d
```

This command will create two containers, one with Alpine image + PHP and another with MySQL image. To access the API, access http://localhost:8000.
