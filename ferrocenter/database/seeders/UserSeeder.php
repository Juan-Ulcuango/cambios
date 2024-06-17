<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        // Asigna el rol 'admin' y 'vendedor' al usuario recién creado
        $user->syncRoles(['admin','vendedor']);
    }
}
