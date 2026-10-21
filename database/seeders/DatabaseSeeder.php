<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Cria o administrador inicial a partir de ADMIN_EMAIL / ADMIN_PASSWORD (.env).
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if ($email && $password) {
            User::updateOrCreate(
                ['email' => $email],
                ['name' => env('ADMIN_NAME', 'Administrador'), 'password' => $password, 'is_admin' => true],
            );
        }
    }
}
