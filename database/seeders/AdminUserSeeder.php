<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // unique check
            [
                'name' => 'SUPADMIN',
                'email' => 'ugbn1973@gmail.com',
                'password' => Hash::make('1973'),
                'userRoll' => 0
            ],
            [
                'name' => 'Gyana',
                'email' => 'grnpati143@gmail.com',
                'password' => Hash::make('Gyana'),
            ],
            [
                'name' => 'Siba',
                'email' => 'msivanandaba@gmail.com',
                'password' => Hash::make('Siba'),
            ]
        );
    }
}
