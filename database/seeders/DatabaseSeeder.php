<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\PengurusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(3)->create();
        User::create([
            'name' => 'Mustafid Kaisalana',
            'email' => 'mustafid.mk@gmail.com',
            'password' => 'password'
        ]);

        $this->call([
            PengurusSeeder::class
        ]);
    }

}
