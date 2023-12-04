# Install and Set Up Laravel Sail + Inertia + Vue3

Setting up Laravel in the local environment with Docker using the LEMP stack that includes: PostgreSQL, PHP(Laravel 10), Vue3 and pgadmin.

## Why use Docker for Development

- [x] Consistent development environment for the entire team.
- [x] You don't need to install a bunch of language environments on your system.
- [x] You can use different versions of the same programming language.
- [x] Deployment is easy

## How to Install and Run the Project

1. ```git@github.com:HappyProgger/Laravel10-Breeze-Sail_db_web.git```
2. ```cd src```
3. ```composer install```
4. Copy ```.env.example``` to ```.env```
5. In ```.env``` change db
    ```
        DB_CONNECTION=pgsql
        DB_HOST=pgsql
        DB_PORT=5432
        DB_DATABASE=laravel
        DB_USERNAME=sail
        DB_PASSWORD=password
    ```
6. In console  ```sail up -d --build```
7. ```php artisan key:generate```
8. ```sail php artisan migrate --seed```
9. ``` npm install```
10. ```npm run dev```


## Mistake with db connection:
1. https://stackoverflow.com/questions/66077795/laravel-sail-database-user-not-created


## Medium

https://medium.com/@hanieasemi/setting-up-a-laravel-local-environment-with-docker-7541ae170daf

## YouTube 

https://www.youtube.com/watch?v=6ANYowpB910

https://www.youtube.com/watch?v=gZfCAIGsz_o
