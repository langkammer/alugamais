@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'aluguel.store', 'data-remote' => $remote, 'id' => 'aluguel-form']) !!}
    @include('aluguel.form', ['salvar' => 'Salvar Aluguel'])
    {!! Form::close() !!}
@endsection
