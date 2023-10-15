@extends('layouts.principal')

@section('titulo', 'Detalhes')

@section('conteudo')
<h3>Informações do cliente</h3>
<p>ID: {{$cliente['id']}}</p>
<p>Nome: {{$cliente['nome']}}</p>
<br>
<a href="{{ route('clientes.index') }}">Voltar</a>
@endsection