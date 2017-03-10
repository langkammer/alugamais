@extends('layouts.app')

@section('content')
    <div class="container center-block">
        <div class="form-group col-md-12">

            <h3>{!! $cliente->nome !!}</h3>
            <h4> Cpf : {!! $cliente->cpf !!}</h4>
            <h4> Telefone : {!! $cliente->telefone !!} </h4>
            <h4> Renda : {!! $cliente->renda !!} </h4>
            <p>Tem Certeza que você deseja deltar esse cliente?</p>


            {!! Form::open(['method' => 'DELETE', 'route' => ['cliente.destroy', $cliente->id]]) !!}
            <button type="submit" class="btn btn-danger">Deletar</button>
            <a href="{{ route('cliente.index') }}" class="btn btn-info" role="button">Voltar</a>
            {!! Form::close() !!}
        </div>
    </div>

@endsection