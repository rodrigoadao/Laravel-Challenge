<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $table = 'filial';
    
    public function automovel()
    {
        return $this->hasMany('App\Models\Automovel');
    }

    public function funcionario()
    {
        return $this->hasMany('App\Models\Funcionario');
    }
    
    protected $fillable = [
        'nome', 'endereco', 'ie' ,'cnpj'
    ];

}
