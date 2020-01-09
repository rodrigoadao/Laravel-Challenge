<?php

use App\Models\Funcionario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('123456'),
            'cargo' => 'admin',
            'salario' => 999999,
            'situacao' => 0,
            'filial_id' => 1
        ]);
    }
}
