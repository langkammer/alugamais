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
            <th>Valor Fatura</th>
            <th>Multa</th>
            <th>Status</th>
            <th></th>

        </tr>
        @foreach ($faturas as $fatura)
            <tr>
                <td>{!! $fatura->id !!}</td>
                <td>{!! $fatura->contratos->clientes->nome !!}</td>
                <td>{!! $fatura->valorTotal !!}</td>
                <td>{!! $fatura->statusPagamento !!}%</td>
                <td>
                @if($fatura->statusPagamento=='pago_atrasado')
                    Pagado Atrasado
                @endif
                @if($fatura->statusPagamento=='pago')
                    Pago
                @endif
                @if($fatura->statusPagamento=='aguardando_pagamento')
                    Aguardando Pagamento
                @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['fatura.edit', $fatura->id]]) !!}
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['fatura.show', $fatura->id]]) !!}
                    <button type="submit" class="btn btn-primary">Ver</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['fatura.confirmDelete', $fatura->id]]) !!}
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection