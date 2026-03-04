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

3. migration
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->fillable();
            $table->string('email')->unique()->fillable();
            $table->string('password')->fillable();
            $table->string('fullname')->unique()->fillable();
            $table->string('email')->unique()->fillable();
            $table->string('phone');
            $table->unsignedTinyInteger('role_id'); 
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('role_id')->references('id')->on('roles'); 
        });

4. membuat Model

        php artisan make:model Role -m

5. Costum Role sesuai kebutuhan

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

6. Membuat Seeder