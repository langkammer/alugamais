@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'contrato.store', 'data-remote' => $remote, 'id' => 'conta-form']) !!}
    @include('contrato.form', ['salvar' => 'Salvar Conta'])
    {!! Form::close() !!}
@endsection
