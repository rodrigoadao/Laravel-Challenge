<?php

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
        [
            'uf'    => 'AC',
            'mask'  => '00.000.000/000-00',
        ],
        [
            'uf'    => 'AL',
            'mask'  => '000000000',
        ],
        [
            'uf'    => 'AP',
            'mask' => '000000000',
        ],
        [
            'uf'    => 'AM',
            'mask' => '00.000.000-0',
        ],
        [
            'uf'    => 'BA',
            'mask' => '000000-00',
        ],
        [
            'uf'    => 'CE',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'CE',
            'mask' => '00000000000-00', 
        ],
        [
            'uf'    => 'ES',
            'mask' => '0000000-0',
        ],
        [
            'uf'    => 'GO',
            'mask' => '00.000.000-0',
        ],
        [
            'uf'    => 'MA',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'MT',
            'mask' => '0000000000-0',
        ],
        [
            'uf'    => 'MS',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'MG',
            'mask' => '000.000.000/0000',
        ],
        [
            'uf'    => 'PA',
            'mask' => '00-000000-0',
        ],
        [
            'uf'    => 'PB',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'PR',
            'mask' => '00.00000-00',
        ],
        [
            'uf'    => 'PE',
            'mask' => '0000000-00',
        ],
        [
            'uf'    => 'PI',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'RJ',
            'mask' => '00.000.00-0',
        ],
        [
            'uf'    => 'RN',
            'mask' => '00.000.000-0',
        ],
        [
            'uf'    => 'RS',
            'mask' => '000/0000000',
        ],
        [
            'uf'    => 'RO',
            'mask' => '00000000000000-0',
        ],
        [
            'uf'    => 'RR',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'SP',
            'mask' => '000.000.000.000',
        ],
        [
            'uf'    => 'SC',
            'mask' => '000.000.000',
        ],
        [
            'uf'    => 'SE',
            'mask' => '00000000-0',
        ],
        [
            'uf'    => 'TO',
            'mask' => '0000000000-0',
        ]
        ];
    
        foreach ($estados as $estado) {
            Estado::create(
                [   
                    'uf' => $estado['uf'],
                    'mask' => $estado['mask']
                ]    
            );
        }
    }
}

