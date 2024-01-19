<?php

namespace Database\Seeders;

use App\Models\AppUser;
use Illuminate\Database\Seeder;

class AppUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppUser::factory()
            ->count(20)
            ->create();
    }
}
