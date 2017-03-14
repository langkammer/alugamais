<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conta;
use App\ContaLancamento;
use App\Contrato;
use App\Http\Requests\ContaLancamentoRequest;
use App\Http\Requests\FaturaRequest;
use App\LancamentoMensal;
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

        $contratos = Contrato::
            select(
            DB::raw("CONCAT('CLIENTE ',clientes.nome, ' ALUGUEL :', aluguels.numeroAluguel, ' CONTRATO ',
             contratos.id , ' ',contratos.dataInicioContrato , ' - ',contratos.dataFimContrato) as nomeF, contratos.id"))
            ->join("aluguels","aluguels.id","=","aluguel_id")
            ->join("clientes","clientes.id","=","cliente_id")
            ->pluck('nomeF','id')
            ->all();


        //return $contratos;

        return view('fatura.create', compact('fatura','contratos'));
    }

    public function edit(LancamentoMensal $lancamentoMensal)
    {
        return view('fatura.edit', compact('lancamentoMensal'));
    }

    public function store(FaturaRequest $request)
    {
        $fatura = new LancamentoMensal();

        $lancamento = $fatura->lancarFatura($request->all());

        session()->flash('flash_message', 'Fatura Inicada com Sucesso!');


        return redirect()->route('fatura.itemFatura', ['id' => $lancamento->id]);
    }

    public function itemFatura($id){

        $item = new ContaLancamento();

        $contas = Conta::all();

        $tiposContas = ['luz' => "Luz",'agua' => "Agua",'outros' => "Outros"];

        $fatura = LancamentoMensal::find($id);

        $itensFatura = $fatura->conta_lancamentos();

        return view('fatura.itemFatura', compact('fatura','itensFatura','contas','tiposContas','item'));


    }

    public function inserirItemFatura(ContaLancamentoRequest $request){

        $fatura = LancamentoMensal::find($request->idFatura);

        if($fatura!=null){
            $lancamento = $fatura->lancarContaFatura($request->all(),$fatura);

            session()->flash('flash_message', 'Item incluido!');

            return redirect()->route('fatura.itemFatura', ['id' => $request->idFatura]);
        }

        else{
            session()->flash('flash_message', 'Erro ao localizar fatura contate administrador!');
            return redirect()->route('fatura.itemFatura', ['id' => $request->idFatura]);
        }

    }

    public function finalizarFatura(){

        return redirect('fatura');
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

    public function lancarConta(FaturaRequest $fatura){

        return $fatura;

    }
}
