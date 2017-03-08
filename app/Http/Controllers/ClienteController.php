<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    //
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

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($cliente->all());
        return $cliente;
    }

    public function destroy(Cliente $cliente)
    {
        return (string) $cliente->delete();
    }
}
