<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{

    public function estado($id)
    {
        $estado = Estado::find($id);
        return $estado;
    }
}
