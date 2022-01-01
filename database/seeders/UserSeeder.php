<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

//fakerのeroquent
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0, 10) as $number) {
            DB::table('users')->insert([
                'name' => 'test' . $number,
                'email' => 'test' . $number . '@email.com',
                //Bcrypt is required to register the password.
                'password' => bcrypt('test' . $number . "pass"),
            ]);

            // $faker = \Faker\Factory::create();
            // // Create 10 message records
            // for ($i = 0; $i < 10; $i++) {
            //     User::create([
            //         'name' => $faker->name(),
            //         'email' => $faker->unique()->email,
            //         'password' => $faker->password,
            //         // 'remember_token' => Str::random(100),
            //     ]);
        }
    }
}
