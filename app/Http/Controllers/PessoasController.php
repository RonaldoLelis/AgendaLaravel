<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoasController extends Controller
{
    private $telefones_controller;
    private $pessoa;

    public function __construct(TelefonesController $telefones_controller)
    {
        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();
    }

    public function index($letra){

        $list_pessoas = Pessoa::indexLetra($letra);
        return view('pessoas.index',[

            'pessoas' => $list_pessoas,
            'criterio' => $letra
        ]);
    }

    public function busca(Request $request){

        $nome = Pessoa::where('nome', 'LIKE', '%' . $request->criterio . '%')->get();
        return view('pessoas.index', [

            'pessoas' => $nome,
            'criterio' => $request->criterio
        ]);
    }

    public function novoView(){

        return view('pessoas.create');
    }

    public function store(Request $request){

        $validacao = $this->validacao($request->all());

        if($validacao->fails()){
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        $pessoa = Pessoa::create($request->all());
        if ($request->ddd && $request->telefone){
            $telefone = new Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->telefone = $request->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);

        }
            
        return redirect('/pessoas')->with('message', 'Contato salvo com sucesso!');
   
    }

    public function excluirView($id){

        return view('pessoas.delete',[
            'pessoa' => $this->getPessoa($id)
        ]);

    }

    public function editarView($id){

        return view('pessoas.edit', [
            'pessoa' => $this->getPessoa($id)
        ]);
    }

    public function destroy($id){

        $this->getPessoa($id)->delete();
        return redirect('/pessoas')->with('success', 'Contato excluído!');
    }

    public function update(Request $request){

        $validacao = $this->validacao($request->all());

        if($validacao->fails()){
            return redirect()->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        $pessoa = $this->getPessoa($request->id);
        $pessoa->update($request->all());
        return redirect('/pessoas');

    }

    protected function getPessoa($id){

        return $this->pessoa->find($id);
    }

    private function validacao($data){

        if (array_key_exists('ddd', $data) && array_key_exists('telefone', $data)){

            if ($data['ddd'] || $data['telefone']){
            $regras['ddd'] = 'required|size:2';
            $regras['telefone'] = 'required';
            }
        }
        

        $regras['nome'] = 'required';

        $mensagens = [
            'nome.required' => 'Campo nome é obrigatório',
            'ddd.required' => 'Insira o DDD',
            'ddd.size' => 'Campo DDD deve ter apenas 2 dígitos',
            'telefone.required' => 'Insira um telefone'
        ];

        return Validator::make($data, $regras, $mensagens);
    }


}
