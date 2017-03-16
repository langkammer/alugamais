@extends('layouts.app')

@section('content')
    <div class="container center-block">
        <div class="form-group col-md-12">
            <div class="col-md-6">
                {!! Form::label('cliente_id', 'Cliente:') !!}
                <p></p>
                {!! $contrato->clientes->nome !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('aluguel_id', 'Aluguel:') !!}
                <p></p>
                {!! $contrato->aluguels->numeroAluguel !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('dataInicioContrato', 'Data Inicio: ') !!}
                <p></p>
                {{ Carbon\Carbon::parse($contrato->dataInicioContrato)->format('d/m/Y') }}
            </div>
            <div class="col-md-3">
                {!! Form::label('dataFimContrato', 'Data Fim:') !!}
                <p></p>
                {{ Carbon\Carbon::parse($contrato->dataFimContrato)->format('d/m/Y') }}
            </div>
            <div class="col-md-3">
                {!! Form::label('tipoContrato', 'Tipo Contrato:') !!}
                <p>
                    @if($contrato->tipoContrato == 'mensal')
                        Mensal
                    @elseif($contrato->tipoContrato == 'diario')
                        Diario
                    @endif
                </p>
            </div>

        </div>
        <div class="form-group col-md-12">
            <p>Tem Certeza que você deseja deltar essa Contrato?</p>

            {!! Form::open(['method' => 'DELETE', 'route' => ['contrato.destroy', $contrato->id]]) !!}
            <button type="submit" class="btn btn-danger">Deletar</button>
            <a href="{{ route('contrato.index') }}" class="btn btn-info" role="button">Voltar</a>
            {!! Form::close() !!}
        </div>

    </div>

@endsection