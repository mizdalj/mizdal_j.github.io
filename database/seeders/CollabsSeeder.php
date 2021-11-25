<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use Faker\Provider\Address;

class CollabsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,300) as $value){
        DB::table('collabs')->insert([
            'civilite' => $faker->randomElement(['male', 'female', 'non-binary']),
            'nom' => $faker->lastname,
            'prenom' => $faker->firstname,
            'adresse' => $faker->streetAddress,
            'codePostal' => Address::postcode(),
            'ville' => $faker->city,
            'numerodetelephone' => $faker->phoneNumber,
            'email' => $faker->email,
            'enterprise_id' => $faker->biasedNumberBetween($min = 1, $max = 100, $function = 'sqrt'),
        ]);
        }
    }
}
