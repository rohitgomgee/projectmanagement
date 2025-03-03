<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class AttributeValueSeeder extends Seeder
{
    public function run()
    {
        AttributeValue::create(['attribute_id' => 1, 'entity_id' => 1, 'value' => 'IT']);
        AttributeValue::create(['attribute_id' => 2, 'entity_id' => 1, 'value' => '2024-02-01']);
        AttributeValue::create(['attribute_id' => 3, 'entity_id' => 1, 'value' => '2024-06-01']);

        AttributeValue::create(['attribute_id' => 1, 'entity_id' => 2, 'value' => 'HR']);
        AttributeValue::create(['attribute_id' => 2, 'entity_id' => 2, 'value' => '2024-01-01']);
        AttributeValue::create(['attribute_id' => 3, 'entity_id' => 2, 'value' => '2024-05-01']);
    }
}
