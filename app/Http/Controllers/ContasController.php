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
