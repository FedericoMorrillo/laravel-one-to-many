<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = new Project();
        $project->title = 'laravel-comics';
        $project->description = 'lorem ipsum';
        $project->code = 'laravel-php';
        $project->last_commit = '2024/02/05';
        $project->save();
    }
}
