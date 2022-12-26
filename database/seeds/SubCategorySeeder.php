<?php

use App\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'category_id'   => 4,
            'order'         => 'AA',
            'short_name'    => 'LÍQUIDAS MODIFICADAS',
            'name'    => 'Resinas epoxi líquidas modificadas avanzadas tipo 1 a 9 en solución (EP).',
        ]);

        SubCategory::create([
            'category_id'   => 4,
            'order'         => 'AA',
            'short_name'    => 'DOW CHEMICALS',
            'name'          => 'Resinas epoxi DOW CHEMICALS',
        ]);
    }
}
