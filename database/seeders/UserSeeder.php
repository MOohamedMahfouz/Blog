<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Mohamed Mahfouz',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1, // Admin
        ]);
    }
}
