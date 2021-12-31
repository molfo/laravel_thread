<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;

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
        }
    }
}
