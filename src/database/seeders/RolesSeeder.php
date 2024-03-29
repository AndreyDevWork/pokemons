<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();

        Role::create(["role" => "student"]);
        Role::create(["role" => "speaker"]);
        Role::create(["role" => "organization"]);
    }
}
