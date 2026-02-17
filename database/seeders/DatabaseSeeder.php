<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            HeroSectionSeeder::class,
            AboutSectionSeeder::class,
            WhatWeDoSectionSeeder::class,
            ServiceSeeder::class,
            ContactInfoSeeder::class,
        ]);
    }
}