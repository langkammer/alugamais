@include('shared.alert')
<div class="container" ng-controller="ClienteController">
    <div class="form-group col-md-12">
        <p>Dados Pessoais</p>
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('nome', 'Nome Completo do Cliente:') !!}
        {!! Form::text('nome', $cliente->nome, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('cpf', 'Cpf:') !!}
        {!! Form::text('cpf', $cliente->cpf, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('rg', 'Rg:') !!}
        {!! Form::text('rg', $cliente->rg, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('renda', 'Renda:') !!}
        R$ {!! Form::text('renda', $cliente->renda, ['class' => 'form-control','data-thousands' => "", 'data-decimal' => "."]) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('enderecoAnterior', 'Endereço Anterior:') !!}
        {!! Form::text('enderecoAnterior', $cliente->enderecoAnterior, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('numeroCarteiraTrabalho', 'Carteira de Trabalho:') !!}
        {!! Form::text('numeroCarteiraTrabalho', $cliente->numeroCarteiraTrabalho, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('telefone', 'Telefone :') !!}
        {!! Form::text('telefone', $cliente->telefone, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('emailCliente', 'Email Cliente :') !!}
        {!! Form::text('emailCliente', $cliente->emailCliente, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-12">
    <p>Dados Bancarios :</p>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('banco', 'Banco:') !!}
        {!! Form::text('banco', $cliente->banco, ['class' => 'form-control']) !!}
        {!! Form::label('agencia', 'Agencia:') !!}
        {!! Form::text('agencia', $cliente->agencia, ['class' => 'form-control']) !!}
        {!! Form::label('conta', 'Conta:') !!}
        {!! Form::text('conta', $cliente->conta, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('tipoConta', 'Tipo Conta:') !!}
        <p>Corrente {!! Form::radio('tipoConta', 'corrente', ['class' => 'form-control']) !!}</p>
        <p>Poupança {!! Form::radio('tipoConta', 'poupanca', ['class' => 'form-control']) !!}</p>

    </div>
    <div class="form-group col-md-12">
        <p>Dados do Fiador :</p>
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('possuiFiador', 'Possui Fiador ?') !!}
        {!! Form::radio('possuiFiador', 'SIM', ['class' => 'form-control'],['ng-model' => 'fiador']) !!} Sim
        {!! Form::radio('possuiFiador', 'NAO', ['class' => 'form-control'],['ng-model' => 'fiador']) !!} Não

    </div>
    <div ng-show="fiador=='SIM'">
        <div class="form-group col-md-6">
            {!! Form::label('nomeFiador', 'Nome Completo Fiador :') !!}
            {!! Form::text('nomeFiador', $cliente->nomeFiador, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('cpfFiador', 'Cpf do Fiador :') !!}
            {!! Form::text('cpfFiador', $cliente->cpfFiador, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('rgFiador', 'Rg do Fiador :') !!}
            {!! Form::text('rgFiador', $cliente->rgFiador, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('enderecoFiador', 'Endereço do Fiador :') !!}
            {!! Form::text('enderecoFiador', $cliente->enderecoFiador, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('telefoneFiador', 'Telefone Fiador :') !!}
            {!! Form::text('telefoneFiador', $cliente->telefoneFiador, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('rendaFiador', 'Renda Fiador :') !!}
            {!! Form::text('rendaFiador', $cliente->rendaFiador, ['class' => 'form-control']) !!}
        </div>
    </div>
    {{--<div class="form-group col-md-6">--}}
        {{--{!! Form::label('dataInicioContrato', 'Data inicial contrato :') !!}--}}
        {{--{!! Form::date('dataInicioContrato', $cliente->dataInicioContrato, ['class' => 'form-control']) !!}--}}

    {{--</div>--}}
    {{--<div class="form-group col-md-6">--}}
        {{--{!! Form::label('dataFimContrato', 'Data final contrato :') !!}--}}
        {{--{!! Form::date('dataFimContrato', $cliente->dataFimContrato, ['class' => 'form-control']) !!}--}}

    {{--</div>--}}
    <div class="form-group col-md-12">
        {!! Form::submit($salvar, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('cliente.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>
</div>