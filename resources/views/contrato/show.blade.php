@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group col-md-3">
            {!! Form::label('tipoConta', 'Tip Conta:') !!}
            <p>
                @if($conta->tipoConta == 'luz')
                    Luz
                @elseif($conta->tipoConta == 'agua')
                    Agua
                @endif
            </p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('nomeConta', 'Nome da Conta:') !!}
            <p>{!! $conta->nomeConta !!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('statusPagamento', 'Status:') !!}
            <p>
            @if($conta->statusPagamento==true)
                Pago
            @else
                Aguardando Pagamento
            @endif
            </p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('quantidadeMedicao', 'Quantidade Medida:') !!}
            <p>{!! $conta->quantidadeMedicao !!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('valor', 'Valor:') !!}
            <p>{!! $conta->valor !!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('valorUnitario', 'Valor Unitario :') !!}
            <p>{!! $conta->valorUnitario !!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('dataIniLeitura', 'Data Leitura Ini:') !!}
            <p>{{ Carbon\Carbon::parse($conta->dataIniLeitura)->format('d/m/Y') }}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('dataFimLeitura', 'Data Leitura Fim :') !!}
            <p>{{ Carbon\Carbon::parse($conta->dataFimLeitura)->format('d/m/Y') }}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('mesRef', 'Mes Ref :') !!}
            <p>{!! $conta->mesRef !!}</p>
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('porcentagemMultaAtraso', 'Multa %:') !!}
            <p>{!! $conta->porcentagemMultaAtraso !!}</p>
        </div>
        <div class="form-group col-md-12">
            <a href="{{ route('contas.index') }}" class="btn btn-info" role="button">Voltar</a>
        </div>
    </div>
@endsection