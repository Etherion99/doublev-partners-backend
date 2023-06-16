<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use Faker\Factory as Faker;

class TicketsSeeder extends Seeder
{
    public function run()
    {
      $faker = Faker::create();

      // Obtén todos los usuarios existentes
      $users = User::all();

      // Crea 20 tickets de ejemplo
      for ($i = 0; $i < 20; $i++) {
        Ticket::create([
          'title' => $faker->sentence,
          'description' => $faker->paragraph,
          'status' => $faker->randomElement(['opened', 'closed']),
          'user_id' => $faker->randomElement($users)->id,
        ]);
      }
    }
}
