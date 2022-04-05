<?php

namespace Database\Seeders;

use App\Models\IncomeCategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 5) as $id) {
            IncomeCategory::create([
                'name' => $faker->unique()->text(12),
                'user_id' => 1
            ]);
        }
    }
}
