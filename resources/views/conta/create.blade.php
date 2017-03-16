@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'contas.store', 'data-remote' => $remote, 'id' => 'conta-form']) !!}
    @include('conta.form', ['salvar' => 'Salvar Conta'])
    {!! Form::close() !!}
@endsection
