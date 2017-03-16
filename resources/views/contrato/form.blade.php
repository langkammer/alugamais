@include('shared.alert')
<div class="container" ng-controller="ContaController">
    <div class="form-group col-md-12">
        <p>Dados do Contrato</p>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('cliente_id', 'Cliente:') !!}
        @if($contrato->cliente_id!=null)
            {!! Form::select('cliente_id',  $clientes, $contrato->cliente_id,['class' => 'form-control','disabled' =>'disabled'] ) !!}
        @else
            {!! Form::select('cliente_id',  $clientes, $contrato->cliente_id,['class' => 'form-control'] ) !!}
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('aluguel_id', 'Aluguel:') !!}
        @if($contrato->aluguel_id!=null)
            {!! Form::select('aluguel_id',  $alugueis, $contrato->aluguel_id,['class' => 'form-control','disabled' =>'disabled'] ) !!}
        @else
            {!! Form::select('aluguel_id',  $alugueis, $contrato->aluguel_id,['class' => 'form-control'] ) !!}
        @endif
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('dataInicioContrato', 'Data Inicio: ') !!}
        {!! Form::date('dataInicioContrato', $contrato->dataInicioContrato, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('dataFimContrato', 'Data Fim:') !!}
        {!! Form::date('dataFimContrato', $contrato->dataFimContrato, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('tipoContrato', 'Status Pagamento:') !!}
        <p>Mensal {!! Form::radio('tipoContrato', 'mensal', ['class' => 'form-control']) !!}</p>
        <p>Diario {!! Form::radio('tipoContrato', 'diario', ['class' => 'form-control']) !!}</p>
    </div>
    <div class="form-group col-md-12">
        {!! Form::submit($salvar, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('contrato.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>
</div>
