<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
      $faker = Faker::create();

      for ($i = 0; $i < 10; $i++) {
        User::create([
          'name' => $faker->firstName,
          'lastname' => $faker->lastName,
          'username' => $faker->userName,
          'email' => $faker->unique()->safeEmail,
          'password' => Hash::make('123')
        ]);
      }
    }
}
