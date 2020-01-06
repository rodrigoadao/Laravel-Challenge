<?php

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create([
            'nome' => 'Rodrigo Adão dos Santos',
            'endereco' => 'Colatina ES, Rua Pedro Epichin',
            'dtNacimento' => '1997-10-28',
            'sexo' => 0,
            'cpf' => '99999999999',
            'cargo' => 'admin',
            'salario' => 999999,
            'situacao' => 0,
            'filial_id' => 1
        ]);
    }
}
