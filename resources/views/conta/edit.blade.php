@extends('layouts.app')

@section('content')
    {!! Form::model($aluguel, ['method' => 'PATCH', 'route' => ['conta.update', $conta->id], 'id' => 'contas-form']) !!}
    @include('conta.form', ['salvar' => 'Atualizar Conta'])
    {!! Form::close() !!}
@endsection