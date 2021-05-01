<?php

namespace Database\Seeders;

use App\Models\Publicadministration;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PublicadministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $user = collect(User::all()->modelKeys());

        for ($i=0; $i < 100 ; $i++) {
            Publicadministration::create([
                    'name'=> $faker->sentence,
                    'user_id' => $user->random()

                ]);
        }

    }
}
