@extends('layouts.app')

@section('content')
    <div class="container">
    @include('shared.alert')
    <h1>Contratos</h1>
    {!! link_to_route('contrato.create', 'Nova Conta', null, [
        'class' => 'btn btn-primary btn-lg',
        'data-remote' => 'true' ]) !!}
        <p></p>
    <table class="table" >
        <tr>

            <th>Cliente</th>
            <th>Aluguel</th>
            <th>Data Inicio</th>
            <th>Data Fim</th>
            <th>Tipo Contrato</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

        </tr>
        @foreach ($contratos as $contrato)
            <tr>
                <td>{!! $contrato->clientes->nome !!}</td>
                <td>{!! $contrato->aluguels->numeroAluguel !!}</td>
                <td>
                    {{ Carbon\Carbon::parse($contrato->dataInicioContrato)->format('d/m/Y') }}
                </td>
                <td>
                    {{ Carbon\Carbon::parse($contrato->dataFimContrato)->format('d/m/Y') }}
                </td>
                <td>
                    @if($contrato->tipoContrato == 'mensal')
                        Mensal
                    @elseif($contrato->tipoConta == 'diario')
                        Diario
                    @endif
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contrato.edit', $contrato->id]]) !!}
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contrato.show', $contrato->id]]) !!}
                    <button type="submit" class="btn btn-primary">Ver</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contrato.confirmDelete', $contrato->id]]) !!}
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'GET', 'route' => ['contrato.imprimirContrato', $contrato->id]]) !!}
                    <button type="submit" class="btn btn-info">Contrato Pdf</button>
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection