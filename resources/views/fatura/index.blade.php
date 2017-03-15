@extends('layouts.app')

@section('content')
    <div class="container">
    @include('shared.alert')
    <h1>Fatura</h1>
    {!! link_to_route('fatura.create', 'Nova Fatura', null, [
        'class' => 'btn btn-primary btn-lg',
        'data-remote' => 'true' ]) !!}
        <p></p>
    <table class="table" >
        <tr>
            <th>Numero</th>
            <th>Cliente</th>
            <th>Aluguel</th>
            <th>Valor</th>
            <th>Status</th>
            <th></th>
            <th></th>
            <th></th>

        </tr>
        @foreach ($faturas as $fatura)
            <tr>
                <td>{!! $fatura->id !!}</td>
                <td>{!! $fatura->contratos->clientes->nome !!}</td>
                <td>{!! $fatura->contratos->aluguels->numeroAluguel !!}</td>
                <td>R$ {!! $fatura->valorTotal !!}</td>
                <td>
                @if($fatura->statusPagamento=='pago_atrasado')
                    Pagado Atrasado
                @endif
                @if($fatura->statusPagamento=='pago')
                    Pago
                @endif
                @if($fatura->statusPagamento=='aguardando_pagamento')
                    Aguardando Pagamento
                @else
                        Aguardando Pagamento
                @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['fatura.itemFatura', $fatura->id]]) !!}
                    <button type="submit" class="btn btn-primary">Ver Fatura</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    @if($fatura->statusBoleto=='boleto_gerado')
                        <a type="submit" target="_blank" href="https://pagseguro.uol.com.br/v2/checkout/payment.html?code={!! $fatura->codigoBoletoPagseguro !!}" class="btn btn-success">Gerar Boleto</a>
                    @else
                        <a class="btn btn-success" disabled>Gerar Boleto</a>
                    @endif
                </td>
                <td>
                    <button type="submit" class="btn btn-danger">Baixar Pagamento</button>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection