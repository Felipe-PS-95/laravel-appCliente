<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function adicionar($id)
    {
        $cliente = \App\Models\Cliente::find($id);
        
        return view('telefone.adicionar',compact('cliente'));
    }

    public function salvar(\App\Http\Requests\TelefoneRequest $request, $id)
    {
        $telefone = new \App\Models\Telefone;
        $telefone->titulo = $request->input('titulo');
        $telefone->telefone = $request->input('telefone');

        \App\Models\Cliente::find($id)->addTelefone($telefone);
        
        \Session::flash('flash_message',[
            'msg'=>"Telefone adicionado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe', $id);
    }

    public function editar($id)
    {
        $telefone = \App\Models\Telefone::find($id);

        if(!$telefone){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse telefone cadastrado!",
                'class'=>"alert-danger"
            ]);

            return redirect()->route('cliente.detalhe', $telefone->cliente->id);
        }

        return view('telefone.editar',compact('telefone'));
    }

    public function atualizar(\App\Http\Requests\TelefoneRequest $request, $id)
    {
        $telefone = \App\Models\Telefone::find($id);
        $telefone->update($request->all());

        \App\Models\Telefone::find($id)->update($request->all());

        \Session::flash('flash_message',[
            'msg'=>"Telefone atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }

    public function deletar($id)
    {
        $telefone = \App\Models\Telefone::find($id);
        $telefone->delete();

        \Session::flash('flash_message',[
            'msg'=>"Telefone deletado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }
}
