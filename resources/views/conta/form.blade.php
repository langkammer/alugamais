@include('shared.alert')
<div class="container" ng-controller="AluguelController">
    <div class="form-group col-md-12">
        <p>Dados Aluguel</p>
    </div>
    <div class="form-group col-md-1">
        {!! Form::label('numeroAluguel', 'Numero:') !!}
        {!! Form::text('numeroAluguel', $aluguel->numeroAluguel, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('valorAluguelMensal', 'Valor  Mensal R$ : ') !!}
        {!! Form::text('valorAluguelMensal', $aluguel->valorAluguelMensal, ['class' => 'form-control','data-thousands' => "", 'data-decimal' => "."]) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('valorAluguelDiario', 'Valor  Diario R$ :') !!}
        {!! Form::text('valorAluguelDiario', $aluguel->valorAluguelDiario, ['class' => 'form-control','data-thousands' => "", 'data-decimal' => "."]) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('multaPorcentagemAtraso', 'Multa Mensal %:') !!}
        {!! Form::text('multaPorcentagemAtraso', $aluguel->multaPorcentagemAtraso, ['class' => 'form-control','data-thousands' => "", 'data-decimal' => "."]) !!}
    </div>
    @if($aluguel->id)
        <div class="form-group col-md-2">
            {!! Form::label('status', 'Status:') !!}
            {{ Form::select('status',  [
                   'alugado' => 'Alugado',
                   'em_reforma' => 'Em Reforma',
                   'aguardoando_locacao' => 'Aguardando Locação'],$aluguel->status,['class' => 'form-control']
            )}}
        </div>
    @endif
    <div class="form-group col-md-12">
        {!! Form::label('descricaoAluguel', 'Descrição da Locação:') !!}
        {!! Form::textarea('descricaoAluguel', $aluguel->descricaoAluguel, ['class' => 'form-control']) !!}

    </div>
    <div class="form-group col-md-12">
        {!! Form::submit($salvar, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('aluguel.index') }}" class="btn btn-info" role="button">Voltar</a>
    </div>
</div>
