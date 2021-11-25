<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use Faker\Provider\Address;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $value){
        DB::table('enterprises')->insert([
            'nom' => $faker->company,
            'adresse' => $faker->streetAddress,
            'codePostal' => Address::postcode(),
            'ville' => $faker->city,
            'numerodetelephone' => $faker->phoneNumber,
            'email' => $faker->email,
        ]);
        }
    }
}
