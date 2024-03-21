<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::factory(15)->create();
    }
}
