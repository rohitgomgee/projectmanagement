<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timesheet;

class TimesheetSeeder extends Seeder
{
    public function run()
    {
        Timesheet::create([
            'task_name' => 'Task 1',
            'date' => '2024-03-01',
            'hours' => 5,
            'user_id' => 1,
            'project_id' => 1,
        ]);

        Timesheet::create([
            'task_name' => 'Task 2',
            'date' => '2024-03-02',
            'hours' => 3,
            'user_id' => 2,
            'project_id' => 2,
        ]);
    }
}
