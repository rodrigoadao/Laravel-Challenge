<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Funcionario extends Authenticatable
{

    use Notifiable;
    protected $table = 'funcionario';

    public function filial()
    {
        return $this->belongsTo('App\Models\Filial','filial_id');
    }

    protected $fillable = [
        'filial_id',
        'nome',
        'endereco',
        'dtNacimento',
        'sexo',
        'cpf',
        'password',
        'cargo',
        'salario',
        'situacao'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }


}
