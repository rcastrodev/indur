<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'=> Company::first()->id,
            'address'   => 'Los Ceibos 455, Boulogne (B1609AVI), Buenos Aires, Argentina',
            'email'     => 'andrescastrodevia@gmail.com|indur@indur.com|ventas@indur.com|asistec@indur.com',
            'phone1'    => '+541147661252|+54 (11) 4766-1252 ',
            'phone2'    => '+54 (11) 4878-1252|11 4738-3753',
            'phone3'    => '+541147665222|+54 (11) 4766-5222',
            'phone4'    => '+541147630810|+54 (11) 4763-0810',
            'phone5'    => '+5491112345678|+54 9 (11) 1234-5678',
            'logo_header'=> 'images/data/logo_header.svg',
            'logo_footer'=> 'images/data/logo_footer.svg'
        ]);
        
    }
}