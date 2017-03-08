<?php

namespace App\Http\Controllers;

use App\Aluguel;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    //
    public function index()
    {
        return Aluguel::all();
    }

    public function store(Request $request)
    {
        return Aluguel::create($request->all());
    }

    public function show(Author $aluguel)
    {
        return $aluguel;
    }

    public function update(Request $request, Aluguel $aluguel)
    {
        $aluguel->update($aluguel->all());
        return $aluguel;
    }

    public function destroy(Aluguel $aluguel)
    {
        return (string) $aluguel->delete();
    }
}
