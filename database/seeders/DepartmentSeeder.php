<?php

namespace Database\Seeders;

use App\Models\Administration;
use App\Models\Department;
use App\Models\Publicadministration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
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
        $administrations = collect(Administration::all()->modelKeys());

        for ($i=0; $i < 100 ; $i++) {
            Department::create([
                    'name'=> $faker->sentence,

                    'user_id' => $users->random(), // department manager

                    'publicadministration_id' => $publicadministrations->random(), // department public administration
                    'administration_id' => $administrations->random(), // department administration

                ]);
        }
    }
}
