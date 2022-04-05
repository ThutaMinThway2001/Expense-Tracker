<?php

namespace Database\Seeders;

use App\Models\Payment;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Payment::create([
            'name' => 'Cash',
            // 'user_id' => auth()->id()
        ]);
        Payment::create([
            'name' => 'Credit Card',
            // 'user_id' => auth()->id()
        ]);
    }
}
