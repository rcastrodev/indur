<?php

use App\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create(['name' => 'Anticongelante']);
        Application::create(['name' => 'Disolvente']);
        Application::create(['name' => 'Combustible']);
        Application::create(['name' => 'Otros']);
    }
}
