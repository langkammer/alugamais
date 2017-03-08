<?php

namespace App\Http\Controllers;

use App\LancamentoMensal;
use Illuminate\Http\Request;

class FaturaController extends Controller
{

    //
    public function index()
    {
        return LancamentoMensal::all();
    }

    public function store(Request $request)
    {
        return LancamentoMensal::create($request->all());
    }

    public function show(LancamentoMensal $lancamentoMensal)
    {
        return $lancamentoMensal;
    }

    public function update(Request $request, LancamentoMensal $lancamentoMensal)
    {
        $lancamentoMensal->update($lancamentoMensal->all());
        return $lancamentoMensal;
    }

    public function destroy(LancamentoMensal $lancamentoMensal)
    {
        return (string) $lancamentoMensal->delete();
    }
}
