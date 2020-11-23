## System requirements
- **php 7.4**
- **docker**

### Docker setup

- Copy the contents of `docker/default.env` into `docker/.env`.

```
cd docker
docker-compose build
docker-compose up
```

### Additional setup
```
cd lawyer-app
composer install
```

- Create a DB named `laywer`
- Copy the contents of `.env.example` into `.env` and provide a MySQL password.

``` 
php artisan migrate
```

