<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conta;
use App\ContaLancamento;
use App\Contrato;
use App\Http\Requests\ContaLancamentoRequest;
use App\Http\Requests\FaturaRequest;
use App\LancamentoMensal;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaturaController extends Controller
{

    //
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function store(Request $request)
    {
        $fatura = new LancamentoMensal();

        $lancamento = $fatura->lancarFatura($request->all());

        session()->flash('flash_message', 'Fatura Inicada com Sucesso!');


        return redirect()->route('fatura.itemFatura', ['id' => $lancamento->id]);
    }

    public function itemFatura($id){

        $item = new ContaLancamento();

        $tiposContas = ['luz' => "Luz",'agua' => "Agua",'outros' => "Outros"];

        $fatura = LancamentoMensal::find($id);

        $itensFatura = $fatura->conta_lancamentos;

        $contas = DB::table('contas')
            ->where('mesRef', '=', $fatura->mesRef)
            ->get();


        return view('fatura.itemFatura', compact('fatura','itensFatura','contas','tiposContas','item'));


    }

    public function inserirItemFatura(ContaLancamentoRequest $request){

        $fatura = LancamentoMensal::find($request->idFatura);

        $item = new ContaLancamento();

        $conta = new ContaLancamento();

        $itensFatura = $fatura->conta_lancamentos();

        $contas = Conta::all();

        $tiposContas = ['luz' => "Luz",'agua' => "Agua",'outros' => "Outros"];

        if($fatura!=null){

            if($item->contasEmFatura($fatura->id,$request->conta_id)){
                session()->flash('flash_message_err', 'Conta já includa na fatura!');
                return redirect()->route('fatura.itemFatura', ['id' => $request->idFatura]);
            }
            else{
                $lancamento = $conta->lancarContaFatura($request->all(),$fatura);

                session()->flash('flash_message', 'Item incluido!');

                return redirect()->route('fatura.itemFatura', ['id' => $request->idFatura]);
            }

        }

        else{
            session()->flash('flash_message', 'Erro ao localizar fatura contate administrador!');
            return view('fatura.itemFatura',['id' => $request->idFatura], compact('fatura','itensFatura','contas','tiposContas','item'));

        }

    }

    public function finalizarFatura(Request $request){

        $fatura = new LancamentoMensal();

        $fatura->fecharFatura(LancamentoMensal::find($request->idFatura));

        return redirect('fatura');
    }

    public function gerarBoleto(Request $request){

        $fatura = new LancamentoMensal();

        $fatura->fecharFatura(LancamentoMensal::find($request->idFatura));

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

    public function excluirContaFatura(Request $request)
    {
        if($request->idConta){

            $fatura = new LancamentoMensal();

            $fatura->detarContaFatura($request->idConta,$request->idFatura);

            session()->flash('flash_message', 'Conta deletada com Sucesso!');

            return redirect()->route('fatura.itemFatura', ['id' => $request->idFatura]);
        }

        else{
            session()->flash('flash_message_err', 'Problema em deletar conta!');

            return redirect()->route('fatura.itemFatura', ['id' => $request->idFatura]);
        }

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

    public  function  gerarPdfFatura(Request $request){

        $fatura = LancamentoMensal::find($request->idFatura);

        $pdf = PDF::loadView('pdf.fatura',array('fatura' => $fatura));

        return $pdf->download('fatura.pdf');
    }
    public function boleto(){

        return view('fatura.boleto', compact('faturas'));
    }
}
