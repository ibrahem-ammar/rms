<?php

namespace Database\Seeders;

use App\Models\Administration;
use App\Models\Branch;
use App\Models\Publicadministration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AdministrationSeeder extends Seeder
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
        $branchs = collect(Branch::all()->modelKeys());

        for ($i=0; $i < 100 ; $i++) {
            Administration::create([
                    'name'=> $faker->sentence,
                    'user_id' => $users->random(),
                    'publicadministration_id' => $publicadministrations->random(),
                    'branch_id' => $branchs->random(),

                ]);
        }
    }
}
