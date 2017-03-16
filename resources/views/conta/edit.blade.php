@extends('layouts.app')

@section('content')
    {!! Form::model($conta, ['method' => 'PATCH', 'route' => ['contas.update', $conta->id], 'id' => 'contas-form']) !!}
    @include('conta.form', ['salvar' => 'Atualizar Conta'])
    {!! Form::close() !!}
@endsection