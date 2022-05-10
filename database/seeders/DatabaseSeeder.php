<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Language::factory(10)->create();
        Company::factory(10)->create();
        // User::factory(1000)->create(); 
        $this->call(UserSeeder::class);
    }
}
 