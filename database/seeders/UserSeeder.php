<?php

namespace Database\Seeders;

use App\Models\Administration;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Publicadministration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $working_at = ['public_administration','administration','branch','department'];
        for ($i=0; $i < 100 ; $i++) {
            $num = random_int(0,3);
            $section = $working_at[$num];
            if ($section == 'public_administration') {
                $section_id = collect(Publicadministration::all()->modelKeys());
            } elseif ($section == 'administration') {
                $section_id = collect(Administration::all()->modelKeys());
            } elseif ($section == 'branch') {
                $section_id = collect(Branch::all()->modelKeys());
            } elseif ($section == 'department') {
                $section_id = collect(Department::all()->modelKeys());
            }

            User::create([
                'name' => $faker->name ,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber ,
                'id_number' => $faker->buildingNumber,
                'job' => $faker->jobTitle,
                'password' => bcrypt('12345678'),
                'working_at' => $section,
                'section_id' => $section_id->random(),
            ]);
        }
    }
}
