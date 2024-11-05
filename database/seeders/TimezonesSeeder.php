<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timezone;

class TimezonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timezones = timezone_identifiers_list();

        foreach ($timezones as $timezone) {
            Timezone::updateOrCreate(['timezone' => $timezone]);
        }
    }
}
