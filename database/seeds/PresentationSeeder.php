<?php

use App\Presentation;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentation::create(['name' => 'Granel']);
        Presentation::create(['name' => 'Camión']);
        Presentation::create(['name' => '1000 litros']);
        Presentation::create(['name' => '200 litros']);
    }
}
