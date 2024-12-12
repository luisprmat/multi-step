<?php

namespace Database\Seeders;

use App\Models\City;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Country::create(['name' => 'United States']);
        Country::create(['name' => 'United Kingdom']);
        Country::create(['name' => 'Germany']);
        Country::create(['name' => 'Colombia']);

        City::create(['country_id' => 1, 'name' => 'New York', 'adult_price' => 100, 'children_price' => 75]);
        City::create(['country_id' => 1, 'name' => 'Washington', 'adult_price' => 150, 'children_price' => 100]);
        City::create(['country_id' => 2, 'name' => 'London', 'adult_price' => 200, 'children_price' => 175]);
        City::create(['country_id' => 2, 'name' => 'Birmingham', 'adult_price' => 250, 'children_price' => 195]);
        City::create(['country_id' => 3, 'name' => 'Berlin', 'adult_price' => 125, 'children_price' => 85]);
        City::create(['country_id' => 3, 'name' => 'Stuttgart', 'adult_price' => 190, 'children_price' => 155]);
        City::create(['country_id' => 4, 'name' => 'Bogotá', 'adult_price' => 80, 'children_price' => 60]);
        City::create(['country_id' => 4, 'name' => 'Medellín', 'adult_price' => 50, 'children_price' => 42]);
        City::create(['country_id' => 4, 'name' => 'Cartagena', 'adult_price' => 170, 'children_price' => 150]);
    }
}
