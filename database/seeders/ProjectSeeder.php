<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create(['name' => 'Project A', 'status' => 'active']);
        Project::create(['name' => 'Project B', 'status' => 'inactive']);
        Project::create(['name' => 'Project C', 'status' => 'completed']);
    }
}
