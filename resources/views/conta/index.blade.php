@extends('layouts.app')

@section('content')
    <div class="container">
    @include('shared.alert')
    <h1>Alugueis</h1>
    {!! link_to_route('aluguel.create', 'Novo Aluguel', null, [
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
        @foreach ($aluguels as $aluguel)
            <tr>
                <td>{!! $aluguel->tipoConta !!}</td>
                <td>{!! $aluguel->nomeConta !!}</td>
                <td>{!! $aluguel->valor !!}</td>
                <td>{!! $aluguel->quantidadeMedicao !!}%</td>
                <td>
                @if($aluguel->statusPagamento==true)
                    Pago
                @else($aluguel->statusPagamento=='aguardoando_locacao')
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