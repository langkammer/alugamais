@extends('layouts.app')

@section('content')
    <div class="container" ng-controller="ClienteController">
    @include('shared.alert')
    <h1>Clientes</h1>
    {!! link_to_route('cliente.create', 'Novo Cliente', null, [
        'class' => 'btn btn-primary btn-lg',
        'data-remote' => 'true' ]) !!}
        <p></p>
    <table class="table" >
        <tr>
            <th>Nome Cliente</th>
            <th>Cpf</th>
            <th>Telefone</th>
            <th>Renda</th>
            <th></th>
            <th></th>
            <th></th>

        </tr>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{!! $cliente->nome !!}</td>
                <td>{!! $cliente->cpf !!}</td>
                <td>{!! $cliente->telefone !!}</td>
                <td>{!! $cliente->renda !!}</td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['cliente.edit', $cliente->id]]) !!}
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['cliente.show', $cliente->id]]) !!}
                    <button type="submit" class="btn btn-primary">Ver</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['cliente.confirmDelete', $cliente->id]]) !!}
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection