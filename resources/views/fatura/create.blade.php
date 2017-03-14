@extends('layouts.app')

@section('content')
    @include('fatura.form', ['salvar' => 'Iniciar Fatura'])
@endsection
