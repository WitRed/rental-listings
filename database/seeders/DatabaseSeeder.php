<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Epigra\TrGeoZones\Database\Seeders\TrGeoZonesDatabaseSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $categories = [
            "Lüks Konut",
            "Müstakil",
            "Sahil Kenarı"
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        $this->call(TrGeoZonesDatabaseSeeder::class);
    }
}
