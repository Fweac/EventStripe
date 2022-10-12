<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ticket;
use App\Models\User;
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
        $this->call([
            TicketSeeder::class,
        ]);


        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'is_admin' => true,
         ])->each(function(User $user){
             Ticket::factory(rand(2, 5))->create([
                 'user_id' => $user->id,
             ]);
         });
    }
}
