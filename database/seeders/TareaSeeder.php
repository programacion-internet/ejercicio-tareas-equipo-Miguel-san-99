<?php

namespace Database\Seeders;

use App\Models\Tarea;
use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarea::factory(10)
            ->has(User::factory(), 'owner')
            ->has(User::factory()->count(3), 'users')
            ->create();

        User::factory(4)->create();
    }
}
