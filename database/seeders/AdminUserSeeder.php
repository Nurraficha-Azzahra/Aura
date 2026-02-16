<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::updateOrCreate(
            ['username' => 'adminza'],
            
            [
                'name' => 'Nurraficha Azzahra',
                'role' => 'admin',
                'password' => 'adminza',
            ]
        );

        User::updateOrCreate(
            ['username' => 'caca'],

            [
                'name' => 'Acha',
                'role' => 'user',
                'password' => 'caca12',
            ]
        );
    }
}
