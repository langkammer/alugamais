@include('shared.alert')
<div class="container" ng-controller="FaturaController">
    <div class="form-group col-md-12">
        <p>Dados da Fatura</p>
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('contrato_id', 'Contrato / Cliente / Aluguel : ') !!}
        {!! Form::select('contrato_id',  $contratos, $fatura->contratos->id,['class' => 'form-control', 'ng-model' => 'contrato'] ) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('mesRef', 'Me Referente : ') !!}
        <p class="input-group">
            <input name="mesRef" value="{!! $fatura->meRef !!}" type="text" class="form-control" uib-datepicker-popup="MM/yyyy" ng-model="dataRefAtual" is-open="dataRef.opened" datepicker-options="dateOptions" ng-required="true" close-text="Fechar" alt-input-formats="altInputFormats" />
            <span class="input-group-btn">
            <button type="button" class="btn btn-default" ng-click="dateRef()"><i class="glyphicon glyphicon-calendar"></i></button>
        </span>
        </p>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('dataEmissao', 'Data Emissao : ') !!}
        {!! Form::date('dataEmissao', $fatura->dataEmissao, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('periodoFaturaIni', 'Periodo Ini : ')  !!}
        {!! Form::date('periodoFaturaIni', $fatura->periodoFaturaIni, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('periodoFaturaFinal', 'Periodo Fim :') !!}
        {!! Form::date('periodoFaturaFinal', $fatura->periodoFaturaFinal, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('dataVencimento', 'Data de Vencimento :') !!}
        {!! Form::date('dataVencimento', $fatura->dataVencimento, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::submit($salvar, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('fatura.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>
</div>
