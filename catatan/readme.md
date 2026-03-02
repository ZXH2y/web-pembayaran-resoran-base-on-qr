1. Insatalasi laravel 12
- install php
laravel new restoran-andri

2. setting .env
    D_BCONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=restoranku
    DB_USERNAME=andri
    DB_PASSWORD=223280019

    tambahkan ini juga:
    APP_TIMEZONE=Asia/Makassar

    file config/app.php
    'timezone' => env('APP_TIMEZONE', 'Asia/Makassar'),

3. migrasion