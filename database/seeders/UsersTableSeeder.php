<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Coordenador',
            'email' => 'coordenador@example.com',
            'password' => Hash::make('password'),
            'role' => 'coordinator'
        ]);

        User::create([
            'name' => 'Aluno',
            'email' => 'aluno@example.com',
            'password' => Hash::make('password'),
            'role' => 'student'
        ]);
    }
}

