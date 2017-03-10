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
            <th>Numero</th>
            <th>Valor Mensal</th>
            <th>Valor Diario</th>
            <th>Multa</th>
            <th>Cliente</th>
            <th>Status</th>
            <th></th>

        </tr>
        @foreach ($aluguels as $aluguel)
            <tr>
                <td>{!! $aluguel->numeroAluguel !!}</td>
                <td>{!! $aluguel->valorAluguelMensal !!}</td>
                <td>{!! $aluguel->valorAluguelDiario !!}</td>
                <td>{!! $aluguel->multaPorcentagemAtraso !!}%</td>
                <td>{!! $aluguel->cliente->nome !!}</td>
                <td>{!! $aluguel->status !!}</td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['aluguel.edit', $aluguel->id]]) !!}
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['aluguel.show', $aluguel->id]]) !!}
                    <button type="submit" class="btn btn-primary">Ver</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['aluguel.confirmDelete', $aluguel->id]]) !!}
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection