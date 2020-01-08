<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    protected $table = 'filial';
    
    protected $fillable = [
        'nome', 'endereco', 'ie' ,'cnpj'
    ];

}
