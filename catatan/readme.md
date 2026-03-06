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
    php artisan make:seeder RoleSeeder


7. Membuat model dan migration untuk kategory dan item
    - php artisan make:model Category -m

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name')->unique();
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
        });

    - php artisan make:model Item -m

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->unsignedBigInteger('category_id');
            $table->string('img')->nullable();
            $table->boolean('is_available')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });


8. Factory Seeder Category dan Item

    - php artisan make:seeder Category

        $cartegories = [
            ['cat_name' => 'Makanan', 'description' => 'Menu makanan utama'],
            ['cat_name' => 'Minuman', 'description' => 'Berbagai jenis minuman'],
        ];

        DB::table('categories')->insert($cartegories);
    

    - php artisan make:factory ItemFactory

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'category_id' => $this->faker->numberBetween(1, 2), 
            'img' => $this->faker->imageUrl(640, 480, 'food'),
            'is_active' => $this->faker->boolean(80), // 80% chance of being available
        ];

    - php artisan make:seeder ItemSeeder
        {
            Item::factory(10)->create();
        }
    

9. Membuat UserFactory

    return [
        'username' => fake()->username(),
        'password' => static::$password ??= Hash::make('password'),
        'fullname' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'phone' => fake()->phoneNumber(),
        'role_id' => fake()->numberBetween(1, 3),
        
    ];

10. Membuat seeder untuk user
    php artisan make:seeder UserSeeder


11. Membuat Tabel Order
    php artisan make:model Order -m

        Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_code')->unique();
                $table->unsignedBigInteger('user_id');
                $table->integer('subtotal');
                $table->integer('tax');
                $table->integer('grand_total');
                $table->enum('status', ['pending', 'settlement' ,'cooked']);
                $table->enum('payment_method', ['tunai', 'qris']);
                $table->text('note')->nullable();
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });

12. Membuat tabel OrderItem
    php artisan make:mode OrderItem -m

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('tax');
            $table->integer('total_price');
            $table->timestamps();
            $tabel->softDeletes();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_id')->references('id')->on('items');

        });



13. Membuat UserFactory
        return [
            'username' => fake()->username(),
            'password' => static::$password ??= Hash::make('password'),
            'fullname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'role_id' => fake()->numberBetween(1, 3),
        ];


# Migrations

