@include('shared.alert')
<div class="container" ng-controller="FaturaController">
    <div class="form-group col-md-12">
        <p>Dados da Fatura</p>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('mesRef', 'Me Referente:') !!}
        {!! Form::text('mesRef', $fatura->mesRef, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('dataEmissao', 'Data Emissao Fatura : ') !!}
        {!! Form::date('dataEmissao', $fatura->dataEmissao, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('periodoFaturaIni', 'Periodo Fatura Ini:') !!}
        {!! Form::date('periodoFaturaIni', $fatura->periodoFaturaIni, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('periodoFaturaFinal', 'Periodo Fatura Fim:') !!}
        {!! Form::date('periodoFaturaFinal', $fatura->periodoFaturaFinal, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('dataVencimento', 'Data de Vencimento:') !!}
        {!! Form::date('dataVencimento', $fatura->dataVencimento, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-12">
        <p>Apurações</p>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('quantidadeLeituraAgua', 'Leitura Agua:') !!}
        {!! Form::number('quantidadeLeituraAgua', $fatura->quantidadeLeituraAgua, ['class' => 'form-control']) !!}
        {!! Form::label('quantidadeLeituraLuz', 'Leitura Luz:') !!}
        {!! Form::number('quantidadeLeituraLuz', $fatura->quantidadeLeituraLuz, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        <p> Valor Agua : R$ </p>
        <p> Valor Luz :  R$ </p>
        <p> Valor Total : R$ </p>
    </div>

    <div class="form-group col-md-12">
        {!! Form::submit($salvar, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('fatura.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>
</div>
