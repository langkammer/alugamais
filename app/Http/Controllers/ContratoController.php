<?php

namespace App\Http\Controllers;

use App\Aluguel;
use App\Cliente;
use App\Contrato;
use App\Http\Requests\ContratoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ContratoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $contratos = Contrato::all();

        return view('contrato.index', compact('contratos'));

    }

    public function create()
    {
        $contrato = new Contrato;

        $clientes = Cliente::pluck('nome', 'id')->all();


        $alugueis = DB::table('aluguels')
            ->where('status', '<>', 'alugado')
            ->get()->pluck('numeroAluguel','id');


        return view('contrato.create', compact('contrato','alugueis','clientes'));
    }

    public function edit(Contrato $contrato)
    {

        $clientes = Cliente::pluck('nome', 'id')->all();

        $alugueis =  Aluguel::pluck('numeroAluguel', 'id')->all();

        return view('contrato.edit',  compact('contrato','alugueis','clientes'));
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

    public function showJson(Contrato $contrato)
    {

        $contratos = new Contrato();
        $contratos->id = $contrato->id;
        $contratos->dataInicioContrato = $contrato->dataInicioContrato;
        $contratos->dataFimContrato = $contrato->dataFimContrato;
        $contratos->clientes = $contrato->clientes;
        $contratos->aluguels = $contrato->aluguels;
        $contratos->tipoContrato = $contrato->tipoContrato;
        return $contratos;
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
    public function imprimirContrato(Contrato $contrato)
    {
        $ini = Carbon::parse($contrato->dataInicioContrato);

        $fim = Carbon::parse($contrato->dataFimContrato);

        $meses =  $ini->diffInMonths($fim);

        $pdf = PDF::loadView('pdf.contrato',array('contrato' => $contrato,'meses'=>$meses));

        return $pdf->download('CONTRATO.pdf');
    }
    public function deleteConfirm(Contrato $contrato)
    {
        return view('contrato.deleteConfirm', compact('contrato'));
    }
}
