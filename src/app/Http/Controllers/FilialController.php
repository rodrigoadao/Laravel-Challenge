<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilialFormRequest;
use App\Models\Filial;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $filial;
     protected $request;

     public function __construct(Filial $filial)
     {
        $this->filial = $filial;
     }

    public function index()
    {
        $filiais = $this->filial::all();
        $title = "Cadastro Filial";
        return view('filial.index',compact('filiais','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar Filial";
        return view('filial.create-edit',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilialFormRequest $request)
    {
        $dataForm = $request->all();
        $insert = $this->filial->create($dataForm);
        if($insert)
            return redirect()->route('filial.index');
        else
            return redirect()->route('filial.create-edit');
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
        $filial = $this->filial->find($id);
        $title = "Filial: {$filial->nome}";

        return view('filial.show', compact('filial','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filial = $this->filial->find($id);
        $title = "Editar {$filial->nome}";
        return view('filial.create-edit',compact('title','filial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilialFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $filial = $this->filial->find($id);
        $update = $filial->update($dataForm);

        if( $update )
            return redirect()->route('filial.index');
        else
            return redirect()->route('filial.edit',$id)->with(['errors' => 'Falha ao editar']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filial = $this->filial->find($id);

        $delete = $filial->delete();
        
        if($delete)
            return redirect()->route('filial.index');
        else
            return redirect()->route('filial.index')->with(['errors' => 'Falha ao deletar']);
    }

}
