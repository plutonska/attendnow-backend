<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Hendri',
            'email' => 'hendri@mail.com',
            'password' => Hash::make('12345678'),

        ]);

        // dummy data for company
        \App\Models\Company::create([
            'name' => 'PT. Attendnow',
            'email' => 'admin@attendnow.com',
            'address' => 'Jl. Jendral Sudirman No. 10, Jakarta Selatan',
            'latitude' => '-6.175110',
            'longitude' => '106.865036',
            'radius_km' => '10',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);

    }
}
