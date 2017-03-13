<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conta;
use App\Contrato;
use App\Http\Requests\FaturaRequest;
use App\LancamentoMensal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $fatura->contratos = new Contrato();

        $fatura->contratos->clientes = new Cliente();

//        $clientes = Cliente::pluck('nome', 'id')->all();

        $contas = Conta::pluck('tipoConta', 'id')->all();

//        $contratos = Contrato::query()->get('id','cliente_id');

        //$contratos = Contrato::pluck('id',' CLIENTE ' + id)->all();

//        $contrato->clientes->nome  / {{$contrato->aluguels->numeroAluguel}} ,$fatura->contratos->id

        $contratos = Contrato::
            select(
            DB::raw("CONCAT('CLIENTE ',clientes.nome, ' ALUGUEL :', aluguels.numeroAluguel, ' CONTRATO ',
             contratos.id , ' ',contratos.dataInicioContrato , ' - ',contratos.dataFimContrato) as nomeF, contratos.id"))
            ->join("aluguels","aluguels.id","=","aluguel_id")
            ->join("clientes","clientes.id","=","cliente_id")
            ->pluck('nomeF','id')
            ->all();


        //return $contratos;

        return view('fatura.create', compact('fatura','contratos','contas'));
    }

    public function edit(LancamentoMensal $lancamentoMensal)
    {
        return view('fatura.edit', compact('lancamentoMensal'));
    }

    public function store(FaturaRequest $request)
    {
        $lancamento = new LancamentoMensal();

        $pequisaLancamentoAnterior = LancamentoMensal::query()->where('');

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
