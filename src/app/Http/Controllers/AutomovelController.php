<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutomovelFormRequest;
use Illuminate\Http\Request;
use App\Models\Automovel;
use App\Models\Filial;
use App\Exports\AutomovelExport;
use Maatwebsite\Excel\Facades\Excel;

class AutomovelController extends Controller
{
    protected $filial;
    protected $automovel;
    protected $export;
    private $totalPage = 5;

    public function __construct(Automovel $automovel,Filial $filial,AutomovelExport $export)
    {
        $this->filial = $filial;
        $this->automovel = $automovel;
        $this->export = $export;
        // $this->middleware('auth')->only(['create','store']);
        // $this->middleware('auth')->except('index');
    }

    public function index(){
        $automoveis = $this->automovel::paginate($this->totalPage);
        $title = "Listagem de Automovéis";
        return view('automovel.index', compact('automoveis','title'));
    }

    public function search(Request $request){
        $dataQuery = $request->all();
        $parametro = $dataQuery['params'];
        $automoveis = Automovel::where('nome','like',"%{$parametro}%")->paginate($this->totalPage);
        $title = 'Listagem dos Automovéis';
        return view('automovel.index', ['automoveis' => $automoveis], compact('title','parametro'));
    }

    public function show($id){
        $automovel = $this->automovel->find($id);
        $title = "Filial: {$automovel->nome}";
        return view('automovel.show', compact('automovel','title'));
    }

    public function create(){

        $categorias = ['Entrada','Hatch pequeno','Hatch médio','Sedã médio', 'Sedã grande','SUV','Pick-ups'];
        $title = "Cadastro Automóvel";
        $filiais = $this->filial->all();
        return view('automovel.create', compact('filiais','categorias','title'));
    }

    public function edit($id){
        $automovel = $this->automovel->find($id);
        $title = "Editar {$automovel->nome}";

        $categorias = ['Entrada','Hatch pequeno','Hatch médio','Sedã médio', 'Sedã grande','SUV','Pick-ups'];
        $filiais = $this->filial->all();
        return view('automovel.edit',compact('title','automovel','categorias','filiais'));
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
        $automovel = $this->automovel->find($id);
        $delete = $automovel->delete();
        if($delete)
            return redirect()->route('automovel.index');
        else
            return redirect()->route('automovel.index')->with(['errors' => 'Falha ao deletar']);
    }

    public function export(){
        $ids = explode(',',$_POST['ids']);
        return Excel::download(new AutomovelExport($ids), 'automoveis.xlsx');
    }
}