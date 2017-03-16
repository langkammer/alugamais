<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Client;

class ClienteController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));

    }

    public function create()
    {
        $cliente = new Cliente;
        return view('clientes.create', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function store(ClienteRequest $request)
    {

        $clienteRequest = Cliente::create($request->all());

        session()->flash('flash_message', 'Cliente cadastrado com Sucesso!');

        return redirect('cliente');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        session()->flash('flash_message', 'Cliente Atualizado com Sucesso');

        return redirect('cliente');
    }

    public function destroy(Cliente $cliente)
    {

        $deleted = $cliente->delete();
        session()->flash('flash_message', 'Cliente deletado com Sucesso!');

        return redirect('cliente');
    }

    public function deleteConfirm(Cliente $cliente)
    {
        return view('clientes.deleteConfirm', compact('cliente'));
    }
}
