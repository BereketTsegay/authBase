<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
       ]);

       $this->command->info('All seeders completed successfully!');
    }
}
