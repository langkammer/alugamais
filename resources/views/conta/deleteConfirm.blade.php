@extends('layouts.app')

@section('content')
    <div class="container center-block">
        <div class="form-group col-md-12">

            <h3>
                @if($conta->tipoConta == 'luz')
                    Luz
                @elseif($conta->tipoConta == 'agua')
                    Agua
                @endif
            </h3>
            <h4> Conta : {!! $conta->nomeConta !!}</h4>
            <h4> Valor : {!! $conta->valor !!} </h4>
            <p>Tem Certeza que você deseja deltar essa Conta?</p>

            {!! Form::open(['method' => 'DELETE', 'route' => ['contas.destroy', $conta->id]]) !!}
            <button type="submit" class="btn btn-danger">Deletar</button>
            <a href="{{ route('contas.index') }}" class="btn btn-info" role="button">Voltar</a>
            {!! Form::close() !!}
        </div>
    </div>

@endsection