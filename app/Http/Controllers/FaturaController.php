<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conta;
use App\Http\Requests\FaturaRequest;
use App\LancamentoMensal;
use Illuminate\Http\Request;

class FaturaController extends Controller
{

    //
    public function index()
    {

        $faturas = LancamentoMensal::all();

        return view('fatura.index', compact('faturas'));

    }

    public function create()
    {
        $fatura = new LancamentoMensal();

        $clientes = Cliente::pluck('nome', 'id')->all();

        $contas = Conta::pluck('tipoConta', 'id')->all();

        return view('fatura.create', compact('fatura','clientes','contas'));
    }

    public function edit(LancamentoMensal $lancamentoMensal)
    {
        return view('fatura.edit', compact('lancamentoMensal'));
    }

    public function store(FaturaRequest $request)
    {
        $lancamento = new LancamentoMensal();

        $lancamentoRequest = $lancamento->registerLoc($request->all());

        session()->flash('flash_message', 'Fatura cadastrado com Sucesso!');

        return redirect('aluguel');
    }

    public function show(LancamentoMensal $fatura)
    {
        return view('fatura.show', compact('aluguel'));
    }

    public function update(FaturaRequest $request, FaturaRequest $fatura)
    {
        $fatura->update($request->all());

        session()->flash('flash_message', 'Fatura Atualizado com Sucesso');

        return redirect('fatura');
    }

    public function destroy(LancamentoMensal $lancamentoMensal)
    {

        $deleted = $lancamentoMensal->delete();
        session()->flash('flash_message', 'Fatura deletado com Sucesso!');

        return redirect('fatura');
    }

    public function deleteConfirm(LancamentoMensal $lancamentoMensal)
    {
        return view('fatura.deleteConfirm', compact('lancamentoMensal'));
    }
}
