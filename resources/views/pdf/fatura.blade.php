<style type="text/css">
    body,td,th {
        font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        font-size: 12px;
    }
    .tabela {
        margin: 0px;
        padding: 0px;
        border: thin solid #666;
    }
</style>
<h2 style="text-align: left;">L&amp;C Aluguel &nbsp;</h2>
<p style="text-align: left;">Rua jos&eacute; luiz de Deus n&ordm; 42 parque s&atilde;o Pedro Venda Nova</p>
<h3 style="text-align: right;">Fatura n&ordm; &nbsp;  {!! $fatura->id !!}</h3>
<hr />
<h3>&nbsp;Dados Cliente&nbsp;</h3>
<hr />
<p>Nome : {!! $fatura->contratos->clientes->nome !!}</p>
<p>Cpf :&nbsp; {!! $fatura->contratos->clientes->cpf !!}</p>
<p>Rg : {!! $fatura->contratos->clientes->rg !!}</p>
<p>Telefone : {!! $fatura->contratos->clientes->telefone !!}</p>
<hr />
@if($fatura->contratos->clientes->possuiFiador == 'SIM')
<h3>&nbsp; Dados&nbsp;Fiador</h3>
<hr />
<p>Nome : {!! $fatura->contratos->clientes->nomeFiador !!}</p>
<p>Cpf :&nbsp; {!! $fatura->contratos->clientes->cpfFiador !!}</p>
<p>Rg : {!! $fatura->contratos->clientes->rgFiador !!}</p>
<hr />
@endif
<h3>&nbsp;Dados do Aluguel</h3>
<hr />
<p>Numero : {!! $fatura->contratos->aluguels->numeroAluguel !!}</p>
<p>Descrição Aluguel :&nbsp; {!! $fatura->contratos->aluguels->descricaoAluguel !!}</p>
<p>Valor Aluguel :&nbsp; R$ {!! $fatura->contratos->aluguels->valorAluguelMensal !!}</p>
<hr />
<h3>&nbsp; Items</h3>
<table width="100%" border="1" class="tabela" style="height: 40px;">
    <tbody>
    <tr>
        <td>Codigo Item</td>
        <td>Descri&ccedil;&atilde;o</td>
        <td>Quantidade</td>
        <td>Valor Unitario</td>
        <td>Total</td>

    </tr>
    <tr>
        <td>Aluguel</td>
        <td>Aluguel</td>
        <td>1</td>
        <td>R$ {!! $fatura->contratos->aluguels->valorAluguelMensal !!}</td>
        <td>R$ {!! $fatura->contratos->aluguels->valorAluguelMensal !!}</td>
    </tr>
    @foreach ($fatura->conta_lancamentos as  $indexKey => $item)
        <tr>
            <td>{{$indexKey ++}} </td>
            <td>{!! $item->contas->nomeConta !!}</td>
            <td>{!! $item->quantidadeLeitura !!}</td>
            <td>R$ {!! $item->valorUnitario !!}</td>
            <td>R$ {!! $item->valor !!}</td>
        </tr>
    @endforeach

    </tbody>
</table>
<hr />
<h5>Data Inicial&nbsp; :
    {{ Carbon\Carbon::parse($fatura->periodoFaturaIni)->format('d/m/Y') }}
</h5>
<h5>Data Final  :
    {{ Carbon\Carbon::parse($fatura->periodoFaturaFinal)->format('d/m/Y') }}
</h5>
<h5>Data Emiss&atilde;o :
    {{ Carbon\Carbon::parse($fatura->dataEmissao)->format('d/m/Y') }}
</h5>
<h5>Data&nbsp;Vencimento :
    {{ Carbon\Carbon::parse($fatura->dataVencimento)->format('d/m/Y') }}
</h5>
<h3>Total Geral&nbsp; : R$ {!! $fatura->valorTotal!!}</h3>
