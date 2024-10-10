<?php

namespace Database\Seeders;

use App\Models\VaccinCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class VaccinCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        
        $centers = [
            'Bangladesh Kuwait Moitree Hospital',
            'Kurmitola General hospital',
            'Mirpur Lalkuthi Hospital', 
            'Railway Hospital',
            'Popular Hospital',
            'Better Life Hostital',
            'Birdem Hospital',
            'City Hospital Ltd',
            'Community Hospital',
            'Islami Bank Hospital'
        ];

        foreach($centers as $key => $center){
            VaccinCenter::query()->create([
                'name'      => $center,
                'location'  => $faker->address,
                'doz_limit_per_day' => random_int(50, 100)
            ]);
        }
    }
}