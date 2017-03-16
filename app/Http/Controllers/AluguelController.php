<?php

namespace App\Http\Controllers;

use App\Aluguel;
use App\Cliente;
use App\Http\Requests\AluguelRequest;

class AluguelController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $aluguels = Aluguel::all();

        return view('aluguel.index', compact('aluguels'));

    }

    public function create()
    {
        $aluguel = new Aluguel;

        $clientes = Cliente::pluck('nome', 'id')->all();


        return view('aluguel.create', compact('aluguel','clientes'));
    }

    public function edit(Aluguel $aluguel)
    {
        return view('aluguel.edit', compact('aluguel'));
    }

    public function store(AluguelRequest $request)
    {


        $aluguel = new Aluguel();

        $aluguelRequest = $aluguel->registerLoc($request->all());

        session()->flash('flash_message', 'Aluguel cadastrado com Sucesso!');

        return redirect('aluguel');
    }

    public function show(Aluguel $aluguel)
    {
        return view('aluguel.show', compact('aluguel'));
    }

    public function update(AluguelRequest $request, Aluguel $aluguel)
    {
        $aluguel->update($request->all());

        session()->flash('flash_message', 'Aluguel Atualizado com Sucesso');

        return redirect('aluguel');
    }

    public function destroy(Aluguel $aluguel)
    {

        $deleted = $aluguel->delete();
        session()->flash('flash_message', 'Aluguel deletado com Sucesso!');

        return redirect('aluguel');
    }

    public function deleteConfirm(Aluguel $aluguel)
    {
        return view('aluguel.deleteConfirm', compact('aluguel'));
    }
}
