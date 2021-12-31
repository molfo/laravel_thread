<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //
        //Command"php artisan db:seed"call DataBaseSeeder->run(),and execution seeding.
        //So you must write seeder file in call().
        $this->call([
            UserSeeder::class,
        ]);
    }
}
