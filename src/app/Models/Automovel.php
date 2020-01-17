<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automovel';

    public function filial()
    {
        return $this->belongsTo('App\Models\Filial','filial_id1');
    }

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
