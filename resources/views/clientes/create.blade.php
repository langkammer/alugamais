@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'cliente.store', 'data-remote' => $remote, 'id' => 'clientes-form']) !!}
    @include('clientes.form', ['salvar' => 'Salvar Cliente'])
    {!! Form::close() !!}
@endsection