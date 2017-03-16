@extends('layouts.app')

@section('content')
    <div class="container">
    @include('shared.alert')
    <h1>Alugueis</h1>
    {!! link_to_route('contas.create', 'Nova Conta', null, [
        'class' => 'btn btn-primary btn-lg',
        'data-remote' => 'true' ]) !!}
        <p></p>
    <table class="table" >
        <tr>
            <th>Tipo Conta</th>
            <th>Nome Conta</th>
            <th>Valor</th>
            <th>Quantidade Medida</th>
            <th>Mes Ref</th>
            <th>Status</th>
            <th></th>

        </tr>
        @foreach ($contas as $conta)
            <tr>
                <td>{!! $conta->tipoConta !!}</td>
                <td>{!! $conta->nomeConta !!}</td>
                <td>{!! $conta->valor !!}</td>
                <td>{!! $conta->quantidadeMedicao !!}%</td>
                <td>
                @if($conta->statusPagamento==true)
                    Pago
                @else($conta->statusPagamento=='aguardoando_locacao')
                    Aguardando Pagamento
                @endif
                </td>
                <td>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection