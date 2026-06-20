<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['name' => 'admin-ggi'],
            [
                'email'    => 'admin@ggi.internal',
                'password' => 'Sleman.21',
            ]
        );
    }
}
