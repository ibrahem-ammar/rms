<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Publicadministration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = collect(User::all()->modelKeys());
        $publicadministrations = collect(Publicadministration::all()->modelKeys());

        for ($i=0; $i < 100 ; $i++) {
            Branch::create([
                    'name'=> $faker->sentence,

                    'user_id' => $users->random(), // branch manager

                    'publicadministration_id' => $publicadministrations->random(), // branch public administration

                ]);
        }
    }
}
