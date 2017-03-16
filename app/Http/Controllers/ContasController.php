<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Http\Requests\ContaRequest;
use Illuminate\Http\Request;

class ContasController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $contas = Conta::all();

        return view('conta.index', compact('contas'));

    }

    public function create()
    {
        $conta = new Conta;

        return view('conta.create', compact('conta'));
    }

    public function edit(Conta $conta)
    {
        return view('conta.edit', compact('conta'));
    }

    public function store(ContaRequest $request)
    {
        $conta = new Conta();

        $contaRequest = Conta::create($request->all());

        session()->flash('flash_message', 'Conta cadastrado com Sucesso!');

        return redirect('contas');
    }

    public function show(Conta $conta)
    {
        return view('conta.show', compact('conta'));
    }

    public function update(ContaRequest $request, Conta $conta)
    {
        $conta->update($request->all());

        session()->flash('flash_message', 'Conta Atualizada com Sucesso');

        return redirect('contas');
    }

    public function destroy(Conta $conta)
    {

        $deleted = $conta->delete();
        session()->flash('flash_message', 'Conta deletada com Sucesso!');

        return redirect('contas');
    }

    public function deleteConfirm(Conta $conta)
    {
        return view('conta.deleteConfirm', compact('conta'));
    }
}
