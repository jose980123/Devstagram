<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'José López',
            'username' => 'jose980123',
            'email' => 'ing.joselopezg@gmail.com',
            'password' => bcrypt('03232820')
        ]);
        User::factory(9)->create();
    }
}
