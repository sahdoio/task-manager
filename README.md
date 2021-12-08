# Task Manager

This project is an API for manage tasks made in Laravel

## Project setup

Configure .env file.

```
cp .env.example .env
```

To start the development of this project, install the dependencies.

With the docker approach, you have all set, including the database part. Start the containers to improve the use.

```
docker-compose up --build -d
```

If you want the tradicional way, just run:

```
composer install
```
```
php artisan serve
```

Make sure to setup the database on the .env file if you choose to run the project by the tradicional way

Access: http://localhost:8000.
