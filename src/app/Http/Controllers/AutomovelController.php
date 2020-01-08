<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutomovelFormRequest;
use Illuminate\Http\Request;
use App\Models\Automovel;
use App\Models\Filial;

class AutomovelController extends Controller
{
    protected $filial;
    protected $automovel;

    public function __construct(Automovel $automovel,Filial $filial)
    {
        $this->filial = $filial;
        $this->automovel = $automovel;
        // $this->middleware('auth')->only(['create','store']);
        // $this->middleware('auth')->except('index');
    }


    public function index(){
        $automoveis = $this->automovel::all();
        $title = "Listagem de Automovéis";
        return view('automovel.index', compact('automoveis','title'));
    }

    public function show($id){
        return ' Exibindo o produto de id: ' + $id;
    }

    public function create(){

        $categorias = ['Entrada','Hatch pequeno','Hatch médio','Sedã médio', 'Sedã grande','SUV','Pick-ups'];
        $title = "Cadastro Automóvel";
        $filiais = $this->filial->all();
        return view('automovel.create-edit', compact('filiais','categorias','title'));
    }

    public function edit($id){
        $automovel = $this->automovel->find($id);
        $title = "Editar {$automovel->nome}";

        $categorias = ['Entrada','Hatch pequeno','Hatch médio','Sedã médio', 'Sedã grande','SUV','Pick-ups'];
        $filiais = $this->filial->all();
        return view('automovel.create-edit',compact('title','automovel','categorias','filiais'));
    }

    public function store(AutomovelFormRequest $request){
        
        $dataForm = $request->all();
        $insert = $this->automovel->create($dataForm);
        if($insert)
            return redirect()->route('automovel.index');
        else
            return redirect()->route('automovel.create');
    }

    public function update(AutomovelFormRequest $request,$id){
        
        $dataForm = $request->all();
        $automovel = $this->automovel->find($id);
        $update = $automovel->update($dataForm);

        if( $update )
            return redirect()->route('automovel.index');
        else
            return redirect()->route('automovel.edit',$id)->with(['errors' => 'Falha ao editar']);
    }

    public function destroy($id){
        return 'Editando Produto ' + $id;
    }
}