<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'RESINAS ACRÍLICAS', 'order' => 'AA']);
        Category::create(['name' => 'RESINAS ALQUÍDICAS', 'order' => 'BB']);
        Category::create(['name' => 'RESINAS DE COLOFONIA', 'order' => 'CC']);
        Category::create(['name' => 'RESINAS EPOXI', 'order' => 'DD']);
        Category::create(['name' => 'RESINAS FENÓLICAS', 'order' => 'EE']);
        Category::create(['name' => 'RESINAS DE MELAMINA', 'order' => 'FF']);
        Category::create(['name' => 'RESINAS DE POLIÉSTERES SATURADOS', 'order' => 'GG']);
        Category::create(['name' => 'RESINAS POLIURETÁNICAS', 'order' => 'HH']);
        Category::create(['name' => 'RESINAS URÉICAS', 'order' => 'II']);
        Category::create(['name' => 'AGENTES DE CURADO SIST. EPOXI (AIR PRODUCTS)', 'order' => 'JJ']);
    }
}
