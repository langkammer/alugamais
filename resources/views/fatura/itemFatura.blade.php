@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'fatura.finalizarFatura', 'data-remote' => $remote, 'id' => 'aluguel-form']) !!}
    @include('fatura.formItemFatura', ['fecharFatura' => 'Fechar Fatura'])
    {!! Form::close() !!}
@endsection
