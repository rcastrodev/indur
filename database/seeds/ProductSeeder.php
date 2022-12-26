<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'sub_category_id'  => 1,
            'name'          => 'EPINDUR EP 1301/40AE',
            'description'   => '<p>Elaboración de tintas líquidas para uso en flexografía y huecograbado. Barniz de sobreimpresión y tintas con excelente anclaje a diferentes sustratos.</p>'
        ]);

        Product::create([
            'sub_category_id'  => 1,
            'name'          => 'EPINDUR EP 1301/75X',
            'description'   => '<p>Elaboración de tintas líquidas para uso en flexografía y huecograbado. Barniz de sobreimpresión y tintas con excelente anclaje a diferentes sustratos.</p>'
        ]);

        Product::create([
            'sub_category_id'  => 1,
            'name'          => 'EPINDUR EP 1307/50BG',
            'description'   => '<p>Elaboración de tintas líquidas para uso en flexografía y huecograbado. Barniz de sobreimpresión y tintas con excelente anclaje a diferentes sustratos.</p>'
        ]);

        Product::create([
            'sub_category_id'  => 1,
            'name'          => 'EPINDUR EP 1309/50BG',
            'description'   => '<p>Elaboración de tintas líquidas para uso en flexografía y huecograbado. Barniz de sobreimpresión y tintas con excelente anclaje a diferentes sustratos.</p>'
        ]);
    }
}

