<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioFormRequest;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Filial;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    protected $filial;
    private $totalPage = 5;

    public function __construct(Filial $filial,Funcionario $funcionario)
    {
        $this->filial = $filial;
        $this->funcionario = $funcionario;
    }
    public function index()
    {
        $funcionarios = $this->funcionario::paginate($this->totalPage);
        $title = 'Listagem do Funcionario';
        return view('funcionario.index', compact('funcionarios','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filiais = $this->filial::all();
        $title = 'Cadastrar Funcionario';
        return view('funcionario.create-edit',compact('filiais','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioFormRequest $request)
    {
        $dataForm = $request->all();
        $dataForm['situacao'] = ( !isset($dataForm['situacao']) ) ? 0 : 1;
        $insert = $this->funcionario->create($dataForm);
        if($insert)
            return redirect()->route('funcionario.index');
        else
            return redirect()->route('funcionario.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$filial = $this->filial->where('id',$id)->get();
        $funcionario = $this->funcionario->find($id);
        $title = "Funcionario: {$funcionario->nome}";
        return view('funcionario.show', compact('funcionario','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *active
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = $this->funcionario->find($id);
        $filiais = $this->filial::all();
        $title = "Editar {$funcionario->nome}";
        return view('funcionario.create-edit',compact('title','funcionario','filiais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioFormRequest $request, $id)
    {
        dd($request);
        $dataForm = $request->all();
        $funcionario = $this->funcionario->find($id);
        $update = $funcionario->update($dataForm);
        if( $update )
            return redirect()->route('funcionario.index');
        else
            return redirect()->route('funcionario.edit',$id)->with(['errors' => 'Falha ao editar']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = $this->funcionario->find($id);
        $delete = $funcionario->delete();
        if($delete)
            return redirect()->route('funcionario.index');
        else
            return redirect()->route('funcionario.index')->with(['errors' => 'Falha ao deletar']);
    }

    public function active($id){
        $funcionario = $this->funcionario->find($id);
        $update = $funcionario->update(['situacao' => 1]);
        if( $update )
            return redirect()->route('funcionario.index');
        else
            return redirect()->route('funcionario.index',$id)->with(['errors' => 'Não foi possível ativar']);
    }

    public function disable($id){
        $funcionario = $this->funcionario->find($id);
        $update = $funcionario->update(['situacao' => 0]);
        if( $update )
            return redirect()->route('funcionario.index');
        else
            return redirect()->route('funcionario.index',$id)->with(['errors' => 'Não foi possível desativar']);
        
    }
}
