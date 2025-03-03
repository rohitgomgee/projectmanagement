<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    public function run()
    {
        Attribute::create(['name' => 'department', 'type' => 'text']);
        Attribute::create(['name' => 'start_date', 'type' => 'date']);
        Attribute::create(['name' => 'end_date', 'type' => 'date']);
    }
}
