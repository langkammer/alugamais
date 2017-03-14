<?php

namespace App\Http\Controllers;

use App\Conta;
use Illuminate\Http\Request;

class ContasController extends Controller
{
    //
    //
    public function index()
    {
        return Conta::all();
    }

    public function store(Request $request)
    {
        return Conta::create($request->all());
    }

    public function show(Conta $conta)
    {
        return $conta;
    }

    public function showJson($id)
    {

        if($id == '----')
            return ['data' => ['data' => null],'mensagem' => "sem dados"];

        $conta = Conta::find($id);

        if($conta!=null)
            return ['data' => ['data' => $conta], 'mensagem' => "ok"];
        else
            return ['data' => ['data' => null],'mensagem' => "sem dados"];

        return ['data' => ['data' => $conta], 'mensagem' => "ok"];
    }

    public function update(Request $request, Conta $conta)
    {
        $conta->update($conta->all());
        return $conta;
    }

    public function destroy(Conta $conta)
    {
        return (string) $conta->delete();
    }
}
