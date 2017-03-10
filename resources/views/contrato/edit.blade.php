@extends('layouts.app')

@section('content')
    {!! Form::model($cliente, ['method' => 'PATCH', 'route' => ['cliente.update', $cliente->id], 'id' => 'clientes-form']) !!}
    @include('clientes.form', ['salvar' => 'Atualizar Cliente'])
    {!! Form::close() !!}
@endsection