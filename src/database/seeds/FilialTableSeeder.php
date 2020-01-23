<?php

use App\Models\Filial;
use Illuminate\Database\Seeder;

class FilialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filial::create([
            'id' => 1,
            'nome' => 'Filial Principal',
            'endereco' => 'Rua dos Anjos nº 0',
            'ie' => 88888888,
            'cnpj' => '999.999/9999-99'
        ]);
    }
}
