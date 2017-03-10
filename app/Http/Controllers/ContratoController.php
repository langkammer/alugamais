<?php

namespace App\Http\Controllers;

use App\Aluguel;
use App\Contrato;
use App\Http\Requests\ContratoRequest;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    //
    public function index()
    {

        $contrato = Contrato::all();

        return view('contrato.index', compact('contrato'));

    }

    public function create()
    {
        $contrato = new Contrato;

        $clientes = Cliente::pluck('nome', 'id')->all();

        $alugueis = Aluguel::pluck('numero', 'id')->all();


        return view('contrato.create', compact('contrato','alugueis','clientes'));
    }

    public function edit(Contrato $contrato)
    {
        return view('contrato.edit', compact('contrato'));
    }

    public function store(ContratoRequest $request)
    {

        $contrato = new Contrato();

        $contratoRequest = $contrato->registerLoc($request->all());

        session()->flash('flash_message', 'Contrato cadastrado com Sucesso!');

        return redirect('contrato');
    }

    public function show(Contrato $contrato)
    {
        return view('contrato.show', compact('contrato'));
    }

    public function update(ContratoRequest $request, Contrato $contrato)
    {
        $contrato->update($request->all());

        session()->flash('flash_message', 'Contrato Atualizado com Sucesso');

        return redirect('contrato');
    }

    public function destroy(Contrato $contrato)
    {

        $deleted = $contrato->delete();
        session()->flash('flash_message', 'Contrato deletado com Sucesso!');

        return redirect('contrato');
    }

    public function deleteConfirm(Contrato $contrato)
    {
        return view('contrato.deleteConfirm', compact('contrato'));
    }
}
