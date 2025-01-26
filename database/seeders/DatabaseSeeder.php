<?php

namespace Database\Seeders;

use App\Models\Academician;
use App\Models\Grant;
use App\Models\Milestone;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

    Academician::factory()->count(20)->create();
    Grant::factory()->count(10)->create();
    Milestone::factory()->count(5)->create();

    foreach(Grant::all() as $grant) {
        $academician = Academician::inRandomOrder()->take(rand(1,5))->pluck('id');
        $grant->projectMember()->attach($academician);
    }
    }
}
