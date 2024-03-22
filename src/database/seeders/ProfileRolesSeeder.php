<?php

namespace Database\Seeders;

use App\Models\ProfileRole;
use Illuminate\Database\Seeder;

class ProfileRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileRole::truncate();

        ProfileRole::create(["role" => "student"]);
        ProfileRole::create(["role" => "speaker"]);
        ProfileRole::create(["role" => "organization"]);
    }
}
