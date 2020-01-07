<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automovel';

    protected $fillable = [
        'filial_id',
        'nome',
        'ano',
        'modelo',
        'cor',
        'chassi',
        'categoria'
    ];
}
