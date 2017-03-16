@extends('layouts.app')

@section('content')
    <div class="container center-block">
        <div class="form-group col-md-12">

            <h3>{!! $conta->tipoConta !!}</h3>
            <h4> Conta : {!! $cliente->nomeConta !!}</h4>
            <h4> Valor : {!! $cliente->valor !!} </h4>
            <p>Tem Certeza que você deseja deltar essa Conta?</p>

            {!! Form::open(['method' => 'DELETE', 'route' => ['conta.destroy', $conta->id]]) !!}
            <button type="submit" class="btn btn-danger">Deletar</button>
            <a href="{{ route('conta.index') }}" class="btn btn-info" role="button">Voltar</a>
            {!! Form::close() !!}
        </div>
    </div>

@endsection