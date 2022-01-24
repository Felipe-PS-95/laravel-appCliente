<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function index()
    {
        $clientes = \App\Models\Cliente::paginate(15);
        // dd($clientes);

        return view('cliente.index',compact('clientes'));
    }

    public function adicionar()
    {
        return view('cliente.adicionar');
    }

    public function detalhe($id)
    {
        $cliente = \App\Models\Cliente::find($id);

        return view('cliente.detalhe',compact('cliente'));
    }

    public function salvar(\App\Http\Requests\ClienteRequest $request)
    {
        // public function salvar(Request $request)
        // {
        //     $request->validate(
        //         [
        //             'nome' => 'required|max:255',
        //             'email' => 'required|email|max:255',
        //             'endereco' => 'required'
        //         ], 
        //         [
        //             'nome.require' => 'Preencha um nome',
        //             'nome.max' => 'Nome deve ter até 255 caracteres',
        //             'email.require' => 'Preencha um e-mail',
        //             'email.email' => 'Preencha um e-mail válido',
        //             'email.max' => 'E-mail deve ter até 255 caracteres',
        //             'endereco.require' => 'Preencha um endereco'
        //         ]
        //     );

        \App\Models\Cliente::create($request->all());

        \Session::flash('flash_message',[
            'msg'=>"Cliente adicionado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.adicionar');
    }

    public function editar($id)
    {
        $cliente = \App\Models\Cliente::find($id);

        if(!$cliente){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse cliente cadastrado! Deseja cadastrar um novo cliente?",
                'class'=>"alert-danger"
            ]);

            return redirect()->route('cliente.adicionar');
        }

        return view('cliente.editar',compact('cliente'));
    }

    public function atualizar(\App\Http\Requests\ClienteRequest $request, $id)
    {
        \App\Models\Cliente::find($id)->update($request->all());

        \Session::flash('flash_message',[
            'msg'=>"Cliente atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.index');
    }

    public function deletar($id)
    {
        $cliente = \App\Models\Cliente::find($id);
        
        if (!$cliente->deletarTelefones()) {
            \Session::flash('flash_message',[
                'msg'=>"Registro não pode ser deletado!",
                'class'=>"alert-danger"
            ]);

            return redirect()->route('cliente.index');
        }

        $cliente->delete();

        \Session::flash('flash_message',[
            'msg'=>"Cliente deletado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.index');
    }

}
