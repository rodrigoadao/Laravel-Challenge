<?php

namespace App\Http\Controllers;

use App\Exports\FuncionarioExport;
use App\Http\Requests\FuncionarioFormRequest;
use App\Http\Requests\FuncionarioEditRequest;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Filial;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuncionarioCreateRequest;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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

    public function main(){
        return view('main');
    }
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::guard('funcionario')->logout();
        return redirect()->route('login');
    }
    public function postLogin(Request $request){

        $validator = validator($request->all(), ['password' => 'required|min:5|numeric']);
        if($validator->fails()){
            return redirect()->route('login')->withErrors(['errors' => 'Erro ao efetuar login'])->withInput();
        }
        $cpf = $request->input('cpf');
        $password = $request->input('password');
        
        $credentials = ['cpf' => $cpf, 'password' => $password, 'situacao' => 1];
        if( Auth::guard('funcionario')->attempt($credentials) ){
            return view('main');
        } else{
            return redirect()->route('login')->withErrors(['errors' => 'LOGIN INVÁLIDO'])->withInput();
        }
    }

    public function index(Request $request)
    {
        $funcionarios = Funcionario::paginate($this->totalPage);
        $title = 'Listagem dos Funcionários';
        return view('funcionario.index', ['funcionarios' => $funcionarios], compact('title'));
    }

    public function search(Request $request){
        $dataQuery = $request->all();
        $parametro = $dataQuery['params'];
        $funcionarios = Funcionario::where('nome','like',"%{$parametro}%")->paginate($this->totalPage);
        $title = 'Listagem dos Funcionários';
        return view('funcionario.index', ['funcionarios' => $funcionarios], compact('title','parametro'));
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
        return view('funcionario.create',compact('filiais','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioCreateRequest $request)
    {
        $dataForm = $request->all();

        $dataForm['dtNacimento'] = str_replace('/','-', $dataForm['dtNacimento']);
        $dataForm['dtNacimento'] = date('Y-m-d',strtotime($dataForm['dtNacimento']));

        $dataForm['situacao'] = ( !isset($dataForm['situacao']) ) ? 0 : 1;

        $dataForm['password'] = Hash::make($dataForm['password']);
        $dataForm['salario'] = str_replace(array(".",","),'',$dataForm['salario']);

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
        return view('funcionario.edit',compact('title','funcionario','filiais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioEditRequest $request, $id)
    {
        $dataForm = $request->all();
        $funcionario = $this->funcionario->find($id);

        $dataForm['dtNacimento'] = str_replace('/','-', $dataForm['dtNacimento']);
        $dataForm['dtNacimento'] = date('Y-m-d',strtotime($dataForm['dtNacimento']));

        $dataForm['password'] == null ? $password = $funcionario->password :
        $password = Hash::make($dataForm['password']);
        $dataForm['password'] = $password;

        $dataForm['salario'] = str_replace(array(".",","),'',$dataForm['salario']);
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

    public function export(){
        $ids = explode(',',$_POST['ids']);
        return Excel::download(new FuncionarioExport($ids), 'funcionarios.xlsx');
    }
}
