<?php

use App\Market;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Market::create([
            'image'     => 'images/market/1.png',
            'name'      => 'ADHESIVOS',
            'content'   => '<p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>
            <p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>'   
        ]); 

        Market::create([
            'image'     => 'images/market/2.png',
            'name'      => 'AGROQUÍMICOS',
            'content'   => '<p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>
            <p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>'   
        ]); 

        Market::create([
            'image'     => 'images/market/3.png',
            'name'      => 'Cosmético',
            'content'   => '<p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>
            <p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>'   
        ]); 

        Market::create([
            'image'     => 'images/market/4.png',
            'name'      => 'LIMPIEZA',
            'content'   => '<p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>
            <p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>'   
        ]); 

        Market::create([
            'image'     => 'images/market/5.png',
            'name'      => 'LIMPIEZA',
            'content'   => '<p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>
            <p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>'   
        ]); 
        
        Market::create([
            'image'     => 'images/market/6.png',
            'name'      => 'METALMECÁNICO',
            'content'   => '<p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>
            <p>La cosmética es una disciplina de las ciencias de la salud que tiene el objetivo de mejorar aspectos físicos de las personas, como la belleza de la piel y del cabello.</p>
            <p>Diseñamos y fabricamos diferentes productos destinados a la industria.</p>'   
        ]); 
    }
}

   
