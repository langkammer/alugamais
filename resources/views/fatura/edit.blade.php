@extends('layouts.app')

@section('content')
    {!! Form::model($aluguel, ['method' => 'PATCH', 'route' => ['aluguel.update', $aluguel->id], 'id' => 'aluguels-form']) !!}
    @include('aluguel.form', ['salvar' => 'Atualizar Aluguel'])
    {!! Form::close() !!}
@endsection