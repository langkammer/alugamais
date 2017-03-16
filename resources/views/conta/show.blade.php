@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group col-md-12">
            <p>Dados Pessoais</p>
        </div>
        <div class="form-group col-md-12">
            {!! Form::label('nome', 'Nome Completo do Cliente:') !!}
            <p>{!! $cliente->nome!!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('cpf', 'Cpf:') !!}
            <p>{!! $cliente->cpf !!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('rg', 'Rg:') !!}
            <p>{!! $cliente->rg !!}</p>
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('renda', 'Renda:') !!}
            <p>{!! $cliente->renda !!}</p>
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('enderecoAnterior', 'Endereço Anterior:') !!}
            <p>{!! $cliente->enderecoAnterior !!}</p>
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('numeroCarteiraTrabalho', 'Carteira de Trabalho:') !!}
            <p>{!! $cliente->numeroCarteiraTrabalho !!}</p>
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('telefone', 'Telefone :') !!}
            <p>{!! $cliente->telefone !!}</p>
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('emailCliente', 'Email Cliente :') !!}
            <p>{!! $cliente->emailCliente !!}</p>
        </div>
        <div class="form-group col-md-12">
            <p>Dados Bancarios :</p>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('banco', 'Banco:') !!}
            <p> {!! $cliente->banco !!}</p>
            {!! Form::label('agencia', 'Agencia:') !!}
            <p> {!! $cliente->agencia !!} </p>
            {!! Form::label('conta', 'Conta:') !!}
            <p> {!! $cliente->conta !!} </p>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('tipoConta', 'Tipo Conta:') !!}
            <p>{!! $cliente->conta !!}</p>

        </div>
        <div class="form-group col-md-12">
            <p>Dados do Fiador :</p>
        </div>
        <div class="form-group col-md-12">
            {!! Form::label('possuiFiador', 'Possui Fiador ?') !!}
            {!! $cliente->possuiFiador !!}
        </div>
        @if($cliente->possuiFiador=='SIM')
            <div class="form-group col-md-6">
                {!! Form::label('nomeFiador', 'Nome Completo Fiador :') !!}
                <p>{!! $cliente->nomeFiador !!}</p>
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('cpfFiador', 'Cpf do Fiador :') !!}
                <p>{!! $cliente->cpfFiador !!}</p>
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('rgFiador', 'Rg do Fiador :') !!}
                <p>{!! $cliente->rgFiador !!}</p>
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('enderecoFiador', 'Endereço do Fiador :') !!}
                <p>{!! $cliente->enderecoFiador !!}</p>
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('telefoneFiador', 'Telefone Fiador :') !!}
                <p>{!! $cliente->telefoneFiador !!}</p>
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('rendaFiador', 'Renda Fiador :') !!}
                <p>{!! $cliente->rendaFiador !!}</p>
            </div>
        @endif
        <div class="form-group col-md-6">
            {!! Form::label('dataInicioContrato', 'Data inicial contrato :') !!}
            <p>{!!  $cliente->dataInicioContrato !!}</p>

        </div>
        <div class="form-group col-md-6">
            {!! Form::label('dataFimContrato', 'Data final contrato :') !!}
            <p>{!! $cliente->dataFimContrato !!}</p>

        </div>
        <div class="form-group col-md-12">
            <a href="{{ route('cliente.index') }}" class="btn btn-info" role="button">Voltar</a>
        </div>
    </div>
@endsection