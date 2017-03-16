@include('shared.alert')
<div class="container" ng-controller="ContaController">
    <div class="form-group col-md-12">
        <p>Dados da Conta</p>
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('tipoConta', 'Tipo da Conta:') !!}
        {{ Form::select('tipoConta',  [
               'luz' => 'Luz',
               'agua' => 'Agua'
               ],
               $conta->tipoConta,
               ['class' => 'form-control']
        )}}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('nomeConta', 'Nome Da Conta:') !!}
        {!! Form::text('nomeConta', $conta->nomeConta, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('quantidadeMedicao', 'Valor  Mensal R$ : ') !!}
        {!! Form::text('quantidadeMedicao', $conta->quantidadeMedicao, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('valorUnitario', 'Valor Unitario:') !!}
        {!! Form::text('valorUnitario', $conta->valorUnitario, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('valor', 'Valor :') !!}
        {!! Form::text('valor', $conta->valor, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('dataIniLeitura', 'Data Inicial:') !!}
        {!! Form::date('dataIniLeitura', $conta->dataIniLeitura, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('dataFimLeitura', 'Data Final:') !!}
        {!! Form::date('dataFimLeitura', $conta->dataFimLeitura, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('mesRef', 'Mes Ref:') !!}
        {!! Form::text('mesRef', $conta->mesRef, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('porcentagemMultaAtraso', 'Multa porcentagem:') !!}
        {!! Form::text('porcentagemMultaAtraso', $conta->porcentagemMultaAtraso, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('statusPagamento', 'Status Pagamento:') !!}
        <p>Conta Paga {!! Form::radio('statusPagamento', 1,$conta->statusPagamento, ['class' => 'form-control']) !!}</p>
        <p>Conta Nao Paga {!! Form::radio('statusPagamento',0, $conta->statusPagamento, ['class' => 'form-control']) !!}</p>
    </div>
    <div class="form-group col-md-12">
        {!! Form::submit($salvar, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('contas.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>
</div>
