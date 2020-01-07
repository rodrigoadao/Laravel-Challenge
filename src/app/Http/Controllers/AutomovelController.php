<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Automovel;
use App\Models\Filial;

class AutomovelController extends Controller
{
    protected $request;
    protected $filial;
    protected $automovel;
    public function __construct(Request $request,Automovel $automovel,Filial $filial)
    {
        $this->request = $request;
        $this->filial = $filial;
        $this->automovel = $automovel;
        // $this->middleware('auth')->only(['create','store']);
        // $this->middleware('auth')->except('index');
    }


    public function index(){
        $automoveis = $this->automovel::all();
        return view('automovel.index', compact('automoveis'));
    }

    public function show($id){
        return ' Exibindo o produto de id: ' + $id;
    }

    public function create(){
        $categorias = ['Entrada','Hatch pequeno','Hatch médio','Sedã médio', 'Sedã grande','SUV','Pick-ups'];
        $filiais = $this->filial->all();
        return view('automovel.create', compact('filiais','categorias'));
    }

    public function edit($id){
        return "Form para editar o produto: {$id}";
    }

    public function store(){
        
        $dataForm = $this->request->all();
        $insert = $this->automovel->create($dataForm);
        if($insert)
            return redirect()->route('automovel.index');
        else
            return redirect()->route('automovel.create');
    }

    public function update($id){
        return 'Editando Produto ' + $id;
    }

    public function destroy($id){
        return 'Editando Produto ' + $id;
    }
}