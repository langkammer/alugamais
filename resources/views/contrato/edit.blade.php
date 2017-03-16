@extends('layouts.app')

@section('content')
    {!! Form::model($contrato, ['method' => 'PATCH', 'route' => ['contrato.update', $contrato->id], 'id' => 'contrato-form']) !!}
    @include('contrato.form', ['salvar' => 'Atualizar Contrato'])
    {!! Form::close() !!}
@endsection