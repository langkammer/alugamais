@extends('layouts.app')

@section('content')
    <div class="container">
    @include('shared.alert')
    <h1>Contas</h1>
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
                <td>
                    @if($conta->tipoConta == 'luz')
                        Luz
                    @elseif($conta->tipoConta == 'agua')
                        Agua
                    @endif
                </td>
                <td>{!! $conta->nomeConta !!}</td>
                <td>R$ {!! $conta->valor !!}</td>
                <td>{!! $conta->quantidadeMedicao !!}</td>
                <td>
                    {!! $conta->mesRef !!}
                </td>
                <td>
                    @if($conta->statusPagamento==true)
                        Pago
                    @else($conta->statusPagamento=='aguardoando_locacao')
                        Aguardando Pagamento
                    @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contas.edit', $conta->id]]) !!}
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contas.show', $conta->id]]) !!}
                    <button type="submit" class="btn btn-primary">Ver</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contas.confirmDelete', $conta->id]]) !!}
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection