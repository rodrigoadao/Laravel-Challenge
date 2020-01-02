<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        // $this->middleware('auth')->only(['create','store']);
        // $this->middleware('auth')->except('index');
    }


    public function index(){
        return 'TESTE CORRETO';
    }

    public function show($id){
        return ' Exibindo o produto de id: ' + $id;
    }

    public function create(){
        return view('automovel.create');
    }

    public function edit($id){
        return "Form para editar o produto: {$id}";
    }

    public function store(){
        return 'Cadastrando um novo produto';
    }

    public function update($id){
        return 'Editando Produto ' + $id;
    }

    public function destroy($id){
        return 'Editando Produto ' + $id;
    }
}
