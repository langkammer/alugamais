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
            <th>Status</th>
            <th></th>

        </tr>
        @foreach ($aluguels as $aluguel)
            <tr>
                <td>{!! $aluguel->numeroAluguel !!}</td>
                <td>{!! $aluguel->valorAluguelMensal !!}</td>
                <td>{!! $aluguel->valorAluguelDiario !!}</td>
                <td>{!! $aluguel->multaPorcentagemAtraso !!}%</td>
                <td>
                @if($aluguel->status=='alugado')
                    Alugado
                @endif
                @if($aluguel->status=='aguardoando_locacao')
                    Aguardando Locação
                @endif
                @if($aluguel->status=='em_reforma')
                    Em Reforma
                @endif
                </td>
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