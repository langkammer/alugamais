@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'fatura.store', 'data-remote' => $remote, 'id' => 'aluguel-form']) !!}
    @include('fatura.form', ['salvar' => 'Salvar Fatura'])
    {!! Form::close() !!}
@endsection
